<?php
  $items_per_page = 15;
  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $offset = ($current_page - 1) * $items_per_page;

  $sql = "SELECT * FROM books";
  // Additional clauses for filtering by category
  if (isset($_GET['category'])) {
    $selected_category = $_GET['category'];
    $where_clauses[] = "Kategoria LIKE '%$selected_category%'";
  }

  // Check if there are any additional clauses
  if (!empty($where_clauses)) {
    $sql .= ' WHERE ' . implode(' AND ', $where_clauses);
  }

  // Add sorting order
  $sql .= " ORDER BY $sort_order";

  // Count total items (considering filters)
  $total_items_sql = "SELECT COUNT(*) as total FROM books";
  if (!empty($where_clauses)) {
    $total_items_sql .= ' WHERE ' . implode(' AND ', $where_clauses);
  }

  // Execute the query to get total items count
  $total_items_result = $conn->query($total_items_sql);
  $total_items = $total_items_result->fetch_assoc()['total'];

  // Calculate total pages based on total items and items per page
  $total_pages = ceil($total_items / $items_per_page);

  // Calculate offset based on current page
  $offset = ($current_page - 1) * $items_per_page;

  // Add LIMIT and OFFSET to the SQL query
  $sql .= " LIMIT $items_per_page OFFSET $offset";