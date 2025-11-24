<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

// SMTP settings are loaded from environment variables when available
// Define these in your hosting provider (e.g., Render dashboard)
// SMTP_HOST, SMTP_USER, SMTP_PASS, SMTP_PORT, SMTP_CRYPTO

$config['smtp_host']   = getenv('SMTP_HOST')   ?: 'smtp.gmail.com';
$config['smtp_user']   = getenv('SMTP_USER')   ?: '';
$config['smtp_pass']   = getenv('SMTP_PASS')   ?: '';
$config['smtp_port']   = getenv('SMTP_PORT')   ?: 587;
$config['smtp_crypto'] = getenv('SMTP_CRYPTO') ?: 'tls';

// Business/branding details
$config['clinic_name'] = getenv('CLINIC_NAME') ?: 'Purple Rain Clinic';
$config['admin_email'] = getenv('ADMIN_EMAIL') ?: '';
