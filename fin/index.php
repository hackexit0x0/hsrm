<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live ITC Stock Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h3 class="text-center mb-4">Live ITC Stock Data (NSE)</h3>
  <div id="stockTable" class="table-responsive"></div>
</div>

<script>
  const apiURL = "https://groww.in/v1/api/stocks_data/v1/accord_points/exchange/NSE/segment/CASH/latest_prices_ohlc/ITC";

  fetch(apiURL)
    .then(response => {
      if (!response.ok) {
        throw new Error("Network response was not ok: " + response.statusText);
      }
      return response.json();
    })
    .then(data => {
      // Assuming the API returns the data directly
      const table = `
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>Type</th>
              <th>Symbol</th>
              <th>Open</th>
              <th>High</th>
              <th>Low</th>
              <th>Close</th>
              <th>LTP</th>
              <th>Volume</th>
              <th>Day Change</th>
              <th>Day Change %</th>
              <th>Low Price Range</th>
              <th>High Price Range</th>
              <th>Buy Qty</th>
              <th>Sell Qty</th>
              <th>Last Trade Qty</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>${data.type}</td>
              <td>${data.symbol}</td>
              <td>${data.open}</td>
              <td>${data.high}</td>
              <td>${data.low}</td>
              <td>${data.close}</td>
              <td>${data.ltp}</td>
              <td>${data.volume}</td>
              <td>${data.dayChange}</td>
              <td>${data.dayChangePerc}%</td>
              <td>${data.lowPriceRange}</td>
              <td>${data.highPriceRange}</td>
              <td>${data.totalBuyQty}</td>
              <td>${data.totalSellQty}</td>
              <td>${data.lastTradeQty}</td>
            </tr>
          </tbody>
        </table>
      `;
      document.getElementById("stockTable").innerHTML = table;
    })
    .catch(error => {
      document.getElementById("stockTable").innerHTML = `
        <div class="alert alert-danger">Error fetching stock data: ${error.message}</div>
      `;
    });
</script>

</body>
</html>
