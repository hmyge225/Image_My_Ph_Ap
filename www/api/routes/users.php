<?php
require_once __DIR__ . '/../db.php';

$sql = "
    SELECT
        u.id,
        u.full_name,
        u.image_url,
        u.linkedin_profile,
        u.cv_link,
        c.name     AS cursus,
        s.name     AS specialization,
        a.name     AS availability
    FROM users u
    LEFT JOIN cursus            c ON u.cursus_id          = c.id
    LEFT JOIN specializations   s ON u.specialization_id  = s.id
    LEFT JOIN availability_status a ON u.availability_id  = a.id
    ORDER BY u.created_at DESC
";

$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(["success" => true, "data" => $data]);
