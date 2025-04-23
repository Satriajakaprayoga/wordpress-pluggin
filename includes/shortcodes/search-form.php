<?php

add_shortcode('search_form', 'myusp_render_search_form');

function myusp_render_search_form() {
    ob_start();

    $keyword = isset($_GET['pdf_search']) ? sanitize_text_field($_GET['pdf_search']) : '';

    ?>
    <!-- Form Pencarian -->
    <form method="get" class="myusp-search-form">
        <input
            type="text"
            name="pdf_search"
            value="<?php echo esc_attr($keyword); ?>"
            placeholder="Cari file PDF..."
            required
        />
        <input type="submit" value="Cari">
    </form>
    <?php

    // Query file PDF
    $args = [
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'post_mime_type' => 'application/pdf',
        's'              => $keyword,
        'posts_per_page' => -1,
    ];

    $query = new WP_Query($args);

    echo '<div class="myusp-pdf-list">';
    if ($query->have_posts()) {
        echo '<h3>' . (empty($keyword) ? 'Daftar Semua PDF:' : 'Hasil Pencarian:') . '</h3>';
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            $url = wp_get_attachment_url(get_the_ID());
            $title = get_the_title();
            $id = get_the_ID();

            // Link ke halaman dengan ?view_pdf=ID
            $current_url = esc_url(add_query_arg('view_pdf', $id));
            echo "<li><a href='$current_url'>" . esc_html($title) . "</a></li>";
        }
        echo '</ul>';
    } else {
        echo '<p>Tidak ditemukan file PDF.</p>';
    }
    echo '</div>';

    wp_reset_postdata();

    // Tampilkan viewer jika ada parameter view_pdf
    if (isset($_GET['view_pdf'])) {
        $pdf_id = intval($_GET['view_pdf']);
        $pdf_url = wp_get_attachment_url($pdf_id);
        $viewer_url = 'https://docs.google.com/viewer?embedded=true&url=' . urlencode($pdf_url);

        if ($pdf_url) {
            echo '<div class="myusp-pdf-viewer">';
            echo '<h3>Pratinjau File:</h3>';
            // echo '<iframe src="' . esc_url($pdf_url) . '"></iframe>';
            // echo '<embed src="' . esc_url($pdf_url) . '" type="application/pdf" width="100%" height="600px" />';
            echo '<iframe src="' . esc_url($viewer_url) . '" width="100%" height="600px"></iframe>';
            echo '</div>';
        } else {
            echo '<p>File PDF tidak ditemukan.</p>';
        }
    }

    return ob_get_clean();
}
