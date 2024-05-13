INSERT INTO `role_permission` (`user_role_id`, `permission_id`) 
SELECT r.id, p.id
FROM `role` r
JOIN `permission` p
WHERE r.nama = 'superadmin';
