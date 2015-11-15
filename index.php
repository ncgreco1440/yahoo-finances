<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
        <input id="ticker-input" type="text" value="" placeholder="Company Ticker Here" name="ticker" />
        <button onClick="getTicker()">View</button>
		<h1 id="company-ticker-name"></h1>
		<h2 id="company-full-name"></h2>

        <h4>ASK:  <span id="company-ask"></span></h4>
        <h4>BID:  <span id="company-bid"></span></h4>
        <h4>Book Value:  <span id="company-bookvalue"></span></h4>
        <h4>Change:  <span id="company-change"></span>%</h4>
        <h4>50 Day Change:  <span id="company-change-fiftydays"></span>%</h4>
        <h4>200 Day Change:  <span id="company-change-twohundreddays"></span>%</h4>
        <h4>Today's High:  <span id="company-today-high"></span></h4>
        <h4>Today's Low:  <span id="company-today-low"></span></h4>
        <h4>Today's Range:  <span id="company-today-range"></span></h4>
        <h4>EPS Current Year Estimate:  <span id="company-eps-estimate-current-year"></span>%</h4>
        <h4>EPS Nest Quarter Estimate:  <span id="company-eps-estimate-next-quarter"></span>%</h4>
        <h4>EPS Next Year Estimate:  <span id="company-eps-estimate-next-year"></span>%</h4>
        <h4>Earnings per Share:  <span id="company-earnings-share"></span></h4>
        <h4>Last Trade Date:  <span id="company-last-trade-day"></span></h4>
        <h4>One Year Target Price:  <span id="company-one-year-target-price"></span></h4>
        <h4>Yearly High:  <span id="company-year-high"></span></h4>
        <h4>Yearly Low:  <span id="company-year-low"></span></h4>
		<script>
            function getTicker() {
                var ticker = document.getElementById("ticker-input").value;
                $.ajax({
                    type: "GET",
                    url: "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" + ticker + "%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys",
                    async: true,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.query.results.quote);
                        var quote = response.query.results.quote;
                        //Set h1 to company's ticker
                        document.getElementById("company-ticker-name").innerHTML = quote.Symbol;
                        //Set h2 to company's full name
                        document.getElementById("company-full-name").innerHTML = quote.Name;

                        document.getElementById("company-ask").innerHTML = quote.Ask;
                        document.getElementById("company-bid").innerHTML = quote.Bid;
                        document.getElementById("company-bookvalue").innerHTML = quote.BookValue;
                        document.getElementById("company-change").innerHTML = quote.Change;
                        document.getElementById("company-change-fiftydays").innerHTML = quote.ChangeFromFiftydayMovingAverage;
                        document.getElementById("company-change-twohundreddays").innerHTML = quote.ChangeFromTwoHundreddayMovingAverage;
                        document.getElementById("company-today-high").innerHTML = quote.DaysHigh;
                        document.getElementById("company-today-low").innerHTML = quote.DaysLow;
                        document.getElementById("company-today-range").innerHTML = quote.DaysRange;
                        document.getElementById("company-eps-estimate-current-year").innerHTML = quote.EPSEstimateCurrentYear;
                        document.getElementById("company-eps-estimate-next-quarter").innerHTML = quote.EPSEstimateNextQuarter;
                        document.getElementById("company-eps-estimate-next-year").innerHTML = quote.EPSEstimateNextYear;
                        document.getElementById("company-earnings-share").innerHTML = quote.EarningsShare;
                        document.getElementById("company-last-trade-day").innerHTML = quote.LastTradeDate;
                        document.getElementById("company-one-year-target-price").innerHTML = quote.OneyrTargetPrice;
                        document.getElementById("company-year-high").innerHTML = quote.YearHigh;
                        document.getElementById("company-year-low").innerHTML = quote.YearLow;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            };
		</script>
	</body>
</html>