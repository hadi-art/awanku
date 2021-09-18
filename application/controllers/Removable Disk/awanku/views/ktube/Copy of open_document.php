<script src="https://gist.github.com/ziahamza/3744524.js"></script>


<script>

var http = require('http'),
    fs = require('fs'),
    path = require('path'),
    exec = require('child_process').exec;

function pipeDoc(inputPath, finalType, stream) {
  var finalPath = path.dirname(inputPath)
    + "/" + path.basename(inputPath).split('.')[0] + ".html";
  var convCommand = 'unoconv -f ' + finalType + " " + inputPath;
  exec(convCommand,function(err, stdout, stderr) {
    process.stdout.write(stdout);
    fs.createReadStream(finalPath).pipe(stream);
  });
}
http.createServer(function(rq, rs) {
  rs.writeHead(200, {'Content-Type': 'text/html'});
  var rqPath = rq.url;
  if (path.extname(rqPath).length > 1) {
    pipeDoc(rq.url, "html", rs);
  }
  else {
    rs.end(
      "<html><body><h1>http://localhost/awanku/subject/doc/AMC00002C0000001.docx/h1></body></html>"
    );
  }
}).listen(8080);
</script>