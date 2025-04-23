<?php
add_action('admin_menu', 'myusp_register_admin_menu');

function myusp_register_admin_menu() {
    // Menu utama
    add_menu_page(
        'PDF Manager',                // Page title
        'PDF Manager',                // Menu title
        'manage_options',             // Capability
        'myusp-dashboard',            // Slug
        'myusp_dashboard_page_html',  // Callback
        'dashicons-media-document',   // Icon
        20
    );

    // Submenu: Dashboard
    add_submenu_page(
        'myusp-dashboard',
        'Dashboard',
        'Dashboard',
        'manage_options',
        'myusp-dashboard',
        'myusp_dashboard_page_html'
    );

    // Submenu: Upload PDF
    add_submenu_page(
        'myusp-dashboard',
        'Upload PDF',
        'Upload PDF',
        'manage_options',
        'myusp-upload',
        'myusp_upload_page_html'
    );

    // Tambahan submenu lain bisa ditaruh di sini nanti (misal: pengaturan, file list, dll)
}

// Halaman dashboard
function myusp_dashboard_page_html() {
    echo '<div class="wrap">';
    echo '<h1>Dashboard PDF Manager</h1>';
    echo '<p>Selamat datang di plugin manajemen PDF. Gunakan menu di samping untuk mengelola file PDF.</p>';
    echo '</div>';
}

// Halaman upload
function myusp_upload_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['myusp_upload_pdf']) && !empty($_FILES['myusp_pdf_file'])) {
        $file = $_FILES['myusp_pdf_file'];

        $file_type = wp_check_filetype($file['name']);
        if ($file_type['ext'] !== 'pdf') {
            echo '<div class="notice notice-error"><p>Hanya file PDF yang diizinkan.</p></div>';
        } else {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $upload = wp_handle_upload($file, ['test_form' => false]);

            if (!isset($upload['error'])) {
                $attachment = [
                    'post_mime_type' => $upload['type'],
                    'post_title'     => sanitize_file_name($file['name']),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                ];

                $attach_id = wp_insert_attachment($attachment, $upload['file']);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                wp_generate_attachment_metadata($attach_id, $upload['file']);

                echo '<div class="notice notice-success"><p>File PDF berhasil diupload!</p></div>';
            } else {
                echo '<div class="notice notice-error"><p>Upload gagal: ' . esc_html($upload['error']) . '</p></div>';
            }
        }
    }

    echo '<div class="wrap">';
    echo '<h1>Upload File PDF</h1>';
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="file" name="myusp_pdf_file" accept="application/pdf" required />';
    echo '<br><br>';
    echo '<input type="submit" name="myusp_upload_pdf" class="button button-primary" value="Upload PDF" />';
    echo '</form>';
    echo '</div>';
}