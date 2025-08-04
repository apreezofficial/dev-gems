<?php
require __DIR__ . '/../../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

function sendMail($to, $subject, $html) {
    try {
        $resend = Resend::client($_ENV['RESEND_API_KEY']);
        
        $result = $resend->emails->send([
            'from' => 'noreply@proforms.top',
            'to' => [$to], 
            'subject' => $subject,
            'html' => $html,
        ]);
        
        error_log('Email sent successfully: ' . json_encode($result));
        return true;
    } catch (Exception $e) {
        error_log('Resend error: ' . $e->getMessage());
        error_log('Error code: ' . $e->getCode());
        return false;
    }
}
function uploadToCloudinary($filePath) {
    $cloudinary = new \Cloudinary\Cloudinary([
        'cloud' => [
            'cloud_name' => $_ENV['CLOUD_NAME'],
            'api_key'    => $_ENV['CLOUD_API_KEY'],
            'api_secret' => $_ENV['CLOUD_API_SECRET'],
        ],
    ]);

    $result = $cloudinary->uploadApi()->upload($filePath);
    return $result['secure_url'];
}
?>