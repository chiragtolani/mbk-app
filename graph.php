

<div style="overflow:scroll; height:500px; margin-top:0px">
<div id="visualization"></div>
   </div>
<div id="loading">loading...</div>

<script type="text/javascript">
  // load data via an ajax request. When the data is in, load the timeline
  $.ajax({
    url: "json/vis.json",
    success: function (data) {
      // hide the "loading..." message
      document.getElementById("loading").style.display = "none";
        var groups = new vis.DataSet([
            {id: 0, content: ""},
            {id: 1, content: "Nicolas Baudin"},
            {id: 2, content: "Al Farabi"},
            {id: 3, content: "Roald Amundsen"},
            {id: 4, content: "Richard Byrd"},
            {id: 5, content: "Martin Behaim"},
            {id: 6, content: "Mattheu Flinders"},
            {id: 7, content: "Ibn Battuta"},
            {id: 8, content: "Al Masaudi"},
            {id: 9, content: "Vasco Da Gama"},
            {id: 10, content: "James Cook"},
            {id: 11, content: "Francis Drake"},
            {id: 12, content: "Vasco de Balboa"},
            {id: 13, content: "Robert Ballard"},
            {id: 14, content: "Al Razi"},
            {id: 15, content: "Ibn Majid"},
            {id: 16, content: "Christopher Columbus"},
            {id: 17, content: "David Livingstone"},
            {id: 18, content: "Ibn Sina"},
            {id: 19, content: "Neil Armstrong"},
            {id: 20, content: "Auditorium"}
        ]);
        /* */
      // DOM element where the Timeline will be attached
      var container = document.getElementById("visualization");
      // Create a DataSet (allows two way data-binding)
      var items = new vis.DataSet(data);
      // Configuration for the Timeline
      var options = {
            groupOrder: function (a, b) {
      return a.value - b.value;
    },
          height: "700px",
    moveable: true,
    editable: true,
    //min: (24*60*60),
    //max: Date.getYear.getTime(),
    start: Date.now(),                  //milliseconds from Jan 1 1970 midnight; real time
    end: Date.now()+(24*60*1000), //next day
    hiddenDates: {
      start: '1998-01-01 22:00:00',
        end: '1998-01-02 06:00:00',
        repeat: 'daily'
    },
    zoomMin: 1000 * 60 * 60 * 10,           //milliseconds unit
    zoomMax: 1000 * 60 * 60 * 24 * 3, //milliseconds unit
    zoomKey: 'altKey',
    showTooltips: true,
    tooltip:{
        followMouse: true,
    },
    format: {
      minorLabels: {
        hour: "h:mm A"
      }
    }
      };
      // Create a Timeline
      var timeline = new vis.Timeline(container);
        timeline.setOptions(options);
        timeline.setGroups(groups);
        timeline.setItems(items);
        
        
    },
    error: function (err) {
      console.log("Error", err);
      if (err.status === 0) {
        alert("Failed to load data/basic.json.\nPlease run this example on a server.");
      }
      else {
        alert("Failed to load data/basic.json.");
      }
    }
  });
</script>

      <br>
       
    



