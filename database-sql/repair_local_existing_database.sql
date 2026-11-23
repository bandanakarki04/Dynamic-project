-- Safe additive repair for the supplied local business_solution_system database.
-- BACK UP the database before running this script.
-- This does not drop or overwrite existing tables or rows.

-- Laravel's MySQL connection uses the sf_ prefix, so the User model resolves
-- to sf_users. The supplied dump currently has only the unprefixed users table.
CREATE TABLE IF NOT EXISTS `sf_users` LIKE `users`;
INSERT IGNORE INTO `sf_users`
    (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
SELECT
    `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`
FROM `users`;

-- The current Solution model and migration use the category field, but the
-- supplied sf_solutions table does not yet contain it.
ALTER TABLE `sf_solutions`
    ADD COLUMN IF NOT EXISTS `category` varchar(255) DEFAULT NULL AFTER `description`;
