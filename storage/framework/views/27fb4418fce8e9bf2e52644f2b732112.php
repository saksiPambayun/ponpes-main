<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Balasan Kritik & Saran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #005F02;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background: #f9f9f9;
        }
        .message-box {
            background: white;
            padding: 15px;
            border-left: 4px solid #005F02;
            margin: 15px 0;
        }
        .reply-box {
            background: #eef3ec;
            padding: 15px;
            border-left: 4px solid #4ca94d;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pondok Pesantren Al Ifadah</h2>
            <p>Balasan Kritik & Saran</p>
        </div>
        
        <div class="content">
            <p>Kepada Yth. <strong><?php echo e($feedbackName); ?></strong>,</p>
            
            <div class="message-box">
                <h4>Pesan Anda:</h4>
                <p><?php echo e(nl2br(e($userMessage))); ?></p>
            </div>
            
            <div class="reply-box">
                <h4>Balasan dari Admin:</h4>
                <p><?php echo e(nl2br(e($replyMessage))); ?></p>
            </div>
            
            <p>Terima kasih atas masukan yang Anda berikan.</p>
            <p>Hormat kami,<br><strong>Admin Pondok Pesantren Al Ifadah</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; <?php echo e(date('Y')); ?> Pondok Pesantren Al Ifadah. All rights reserved.</p>
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html><?php /**PATH D:\ponpes-main\resources\views\emails\feedback.blade.php ENDPATH**/ ?>