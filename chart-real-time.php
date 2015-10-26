<html>
  <head>

    <script type="text/javascript" src="assets/eon/eon.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/eon/eon.css" />

  </head>
  <body>
    <div id="chart"></div>
    <script>
      var pubnub = PUBNUB.init({
        publish_key: 'pub-c-6dbe7bfd-6408-430a-add4-85cdfe856b47',
        subscribe_key: 'sub-c-2a73818c-d2d3-11e3-9244-02ee2ddab7fe'
      });
      var channel = 'c3-gauge'  + Math.random();
      
      eon.chart({
        pubnub: pubnub,
        channel: channel,
        generate: {
          bindto: '#chart',
          data: {
            type: 'gauge'
          }
        }
      });
    </script>
    <script>
      setInterval(function(){
        pubnub.publish({
          channel: channel,
          message: {
            eon: {
              'Austin': Math.floor(Math.random() * 99)
            }
          }
        });
      }, 2000);
    </script>
    <br/>
    <a href="./index.php"> ~ datagram ~ </a>
  </body>
</html>
