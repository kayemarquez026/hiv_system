<?php
// Example transaction data
$transaction = [
    'tx_no' => 'TX12345',
    'patient_name' => 'Juan Dela Cruz',
    'description' => 'HIV Medication Payment',
    'amount' => 1500,
    'status' => 'paid',
    'created_at' => '2025-11-24 14:00:00'
];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Transaction Receipt</title>
<style>
    /* Center the receipt vertically and horizontally */
    body {
        font-family: "Courier New", monospace;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f2f2f2;
    }

    /* Receipt styling */
    .outer-border {
        border: 2px dashed #333;
        background: #fff;
        padding: 30px 35px; /* increased padding */
        width: 450px; /* wider for better readability */
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .center { text-align: center; }
    .title { font-size: 24px; font-weight: bold; margin-bottom: 10px; }
    .subtitle { font-size: 16px; margin-bottom: 20px; }
    .line { border-bottom: 1px dashed #000; margin: 15px 0; }
    .row { display: flex; justify-content: space-between; font-size: 16px; margin: 10px 0; }
    small { font-size: 14px; }

    /* Make it print nicely */
    @media print {
        body { background: #fff; }
        .outer-border { border: 2px dashed #000; width: 100%; box-shadow: none; }
    }
</style>
</head>
<body>

<div class="outer-border" id="receipt">
    <div class="center">
        <div class="title">HIV TREATMENT CLINIC</div>
        <div class="subtitle">Official Payment Receipt</div>
    </div>

    <div class="line"></div>

    <div class="row">
        <span>Transaction No:</span>
        <span><?php echo htmlspecialchars($transaction['tx_no']); ?></span>
    </div>

    <div class="row">
        <span>Patient:</span>
        <span><?php echo htmlspecialchars($transaction['patient_name']); ?></span>
    </div>

    <div class="row">
        <span>Description:</span>
        <span><?php echo htmlspecialchars($transaction['description']); ?></span>
    </div>

    <div class="row">
        <span>Amount:</span>
        <span>₱<?php echo number_format($transaction['amount'], 2); ?></span>
    </div>

    <div class="row">
        <span>Status:</span>
        <span><?php echo ucfirst(htmlspecialchars($transaction['status'])); ?></span>
    </div>

    <div class="line"></div>

    <div class="center">
        <small>Date Issued: <?php echo date("M d, Y h:i A", strtotime($transaction['created_at'])); ?></small>
        <br>
        <small>Thank you for your payment.</small>
    </div>

    <div class="line"></div>

    <div class="center">
        <small>*** This serves as your official receipt ***</small>
    </div>
</div>

<script>
    function downloadWord() {
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
                     "xmlns:w='urn:schemas-microsoft-com:office:word' " +
                     "xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'></head><body>";
        var footer = "</body></html>";
        var content = document.getElementById("receipt").outerHTML;
        var blob = new Blob([header + content + footer], { type: "application/msword" });
        var url = URL.createObjectURL(blob);
        var a = document.createElement("a");
        a.href = url;
        a.download = "receipt_<?php echo $transaction['tx_no']; ?>.doc";
        a.click();
        URL.revokeObjectURL(url);
    }

    window.addEventListener('load', function() {
        setTimeout(downloadWord, 500); // automatically download Word after preview
    });
</script>

</body>
</html>
