<?php
// Public front controller delegates to root index without altering design.
// Keeps compatibility when host sets document root to /public.
require_once dirname(__DIR__) . '/index.php';
