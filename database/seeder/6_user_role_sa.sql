INSERT INTO `user_role` (`user_id`, `role_id`) 
SELECT u.id, r.id
FROM `role` r
join `user` u
WHERE r.nama = 'superadmin' and u.email = 'admin'
