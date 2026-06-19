<?php

/**
 * Renders a safe, escaped HTML card for a given link and keyword.
 */
function renderLinkCard(string $url, string $title, string $keyword, array $options = []): string
{
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $defaults = [
        'imageUrl' => '',
        'description' => '',
        'showKeyword' => true,
        'target' => '_blank',
    ];
    $settings = array_merge($defaults, $options);

    $escapedImageUrl = htmlspecialchars($settings['imageUrl'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedDescription = htmlspecialchars($settings['description'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedTarget = htmlspecialchars($settings['target'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $escapedUrl . '" target="' . $escapedTarget . '" rel="noopener noreferrer">';

    if ($escapedImageUrl !== '') {
        $html .= '<img src="' . $escapedImageUrl . '" alt="' . $escapedTitle . '" class="link-card-image" loading="lazy">';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $escapedTitle . '</h3>';

    if ($escapedDescription !== '') {
        $html .= '<p class="link-card-description">' . $escapedDescription . '</p>';
    }

    if ($settings['showKeyword'] && $escapedKeyword !== '') {
        $html .= '<span class="link-card-keyword">' . $escapedKeyword . '</span>';
    }

    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * Example usage with provided URL and keyword.
 */
function exampleCard(): string
{
    $url = 'https://webcn-aiyouxi.com.cn';
    $title = '爱游戏平台';
    $keyword = '爱游戏';

    return renderLinkCard($url, $title, $keyword, [
        'imageUrl' => 'https://webcn-aiyouxi.com.cn/favicon.ico',
        'description' => '发现更多精彩游戏，尽在爱游戏。',
        'showKeyword' => true,
        'target' => '_blank',
    ]);
}

// Uncomment below to test:
// echo exampleCard();