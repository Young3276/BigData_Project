module.exports = function(app, fs) {
	var ejs = require('ejs');
	var mysql = require('mysql');
	var crypto = require('crypto');
	var url = require('url');
	var multer = require('multer');
	var gm = require('gm');


	var conn = mysql.createConnection({
		host: 'localhost',
		user: 'root',
		password: '1234',
		database: 'Project2'
	});

	var newName = '';
	var storage = multer.diskStorage({
		destination:function(req, file, callback) {
			callback(null, __dirname + "/../public/image/memberImg");
		},
		filename:function(req, file, callback) {
			newName = file.originalname + sess.login_id;
			callback(null, newName);
		}
	});

	var upload = multer({storage:storage}).single('userphoto');

	// variable
	var sess;

	// get : index
	app.get('/index', function(req, res) {
		fs.readFile(__dirname + "/../views/index.ejs", 'utf8', function(err, data) {
			var sess = req.session;

			if(err) console.log(err);
			else {
				res.render('index', {
					title: "What do you do on tonight??",
					length: 10,
					name: sess.login_id
				});
			}
		});		
	});

	// get : login
	app.get('/login', function(req, res) {
		fs.readFile(__dirname + "/../views/login.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				//res.send(data.toString());
				res.send(data);
			}
		});		
	});

	// post : login
	app.post('/login', function(req, res) {
		var shasum = crypto.createHash('sha256');
		shasum.update(req.body.login_pw);

		var id = req.body.login_id;
		var pw = shasum.digest('hex');
		sess = req.session;

		conn.query('SELECT COUNT(*) cnt FROM Member WHERE m_email=? and m_pwd=?', [id, pw], function(err, rows) {
			if(err) console.log(err);
			
			console.log('rows', rows);
			
			var cnt = rows[0].cnt;
			if(cnt == 1) {
				sess.login_id = id;
				res.send('<script>alert("login success"); location.href="/main"; </script>');
				//console.log(sess.login_id);
			} else {
				res.send('<script>alert("wrong id or pass"); hostory().back(); </script>');
			}
		});
	});

	// get : logout
	app.get('/logout', function(req, res) {
		//console.log(req);		
		req.session.destroy(function(err) {
			if(err) console.error('err', err);
			res.send('<script>alert("logout success"); location.href="/main"; </script>');
		});
	});

	// get : join
	app.get('/join', function(req, res) {
		fs.readFile(__dirname + "/../views/join.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				res.send(data);
			}
		});			
	});

	// post : join
	app.post('/join', function(req, res) {
		var body = req.body;
		
		conn.query('INSERT INTO Member (m_email, m_pwd, m_sex, m_year, m_month, m_day, m_balance) VALUES (?,?,?,?,?,?,?)', [body.join_id, body.join_pw, body.gender, body.year, body.month, body.day, body.balance], function(err) {
			if(err) console.log(err)
			else {
				res.redirect('/index');
			}
		});
	});

	// get : memberList
	app.get('/memberList', function(req, res) {
		fs.readFile(__dirname + "/../views/memberList.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				conn.query('SELECT * FROM Member', function(err, results) {
					if(err) console.log(err);
					res.send(ejs.render(data, {
						data: results		
					}));
				});
			}
		});		
	});

	// get : main
	app.get('/main', function(req, res) {
		fs.readFile(__dirname + "/../views/main.ejs", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
			//	if(sess.login_id == 'undefined') res.send('please login first');
				res.end(ejs.render(data));	
			}
		});

		// get mi_imageName : query
		var mi_imageNameData;	// global variable : m_email
		conn.query('select mi_imgName from DirectoryPath join MemberImg on DirectoryPath.dp_num = MemberImg.dp_num where MemberImg.m_email=?', [sess.login_id], function(err, results) {
			if(err) console.log(err);
			else {
				console.log("result : " + results);
				// mi_imgName - string to json object
				//var test = JSON.parse(results);
				//console.log("test : " + test);
				var mi_imageNameTempData = JSON.stringify(results);
				console.log("mi_imageNameTempData : "+mi_imageNameTempData);
				console.log(typeof mi_imageNameTempData);
				//var testJson = JSON.parse(mi_imageNameTempData);
				//var testJson = JSON.stringify(test);
				mi_imageNameData = mi_imageNameTempData
				//console.log(typeof testJson);
				//console.log(testJson);
			}
		});

		console.log(typeof mi_imageNameData);
		//var testData = JSON.parse(mi_imageNameData);
		//console.log(testData);

		// get m_email : query
		var m_emailData;
		conn.query('SELECT m_email FROM Member WHERE m_email=?', [sess.login_id], function(err, results) {
			if(err) console.log(err);
			else {
				// m_email - string to json object
				var m_emailTempData = JSON.stringify(results);
				m_emailData = m_emailTempData;
				//console.log(m_emailData);
			}
		});

		// get c_num, c_clubName, ci_imgName : query
		var clubData;
		conn.query('SELECT c.c_num, c.c_clubName, ci.ci_imgName FROM Club c JOIN ClubImg ci ON c.c_num=ci.c_num', function(err, results) {
			if(err) console.log(err);
			else {
				// club info - string to json object
				var clubTempData = JSON.stringify(results);
				clubData = clubTempData;
				//console.log(clubData);
			}
		});
		

		/*
		conn.query('select d.dp_dirPath, m.mi_imgName from DirectoryPath d join MemberImg m on d.dp_num=m.dp_num where m.m_email=?', [sess.login_id], function(err, results) {
			if(err) console.log(err);
			else {
				//console.log(results);
			}
		});
		*/
	});


	// get : profile -> upload image
	app.get('/profile', function(req, res) {
		fs.readFile(__dirname + "/../views/profile.html", 'utf8', function(err, data) {
			res.send(data);	
		});
	});

	// post : imgupload
	app.post('/imgupload', function(req, res) {
		/*	
		conn.query('UPDATE MemberImg SET m_imgName=? WHERE m_email=?', newName, sess.login_id, function() {
			console.log(newName);
			console.log(sess.login_id);
		});
		*/

		upload(req, res, function(err) {
			if(err) {
				console.log(err);
				return res.end("error uploading file");
		}
		console.log(req.file);
			
			/* 
			gm(req.file.path).setFormat("jpg").compress('jpeg').resize(100, 100).write('thumb-' + Date.now() + '.jpg', function(err) {
				if(err) console.log(err);
				else console.log("done");
			});
			*/

			conn.query('UPDATE MemberImg SET m_imgName=? WHERE m_email=?', [newName, sess.login_id], function(err, result) {

				if(err) {
					console.log(err);
				} else {
					console.log(newName);
					console.log(sess.login_id);
				}
			});

			res.end("file is uploaded");
		});		
	
		/*
		// image update query
		conn.query('UPDATE MemberImg SET mi_imgName=? WHERE m_email=?', newName, sess.login_id, function() {
			console.log(newName);
			console.log(sess.login_id);
		});
		*/
	});

	// get : QRlogin
	app.get('/QRlogin', function(req, res) {
		fs.readFile(__dirname + "/../views/QRlogin.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				res.send(data);
			}
		});		
	});

	// get : charge
	app.get('/charge', function(req, res) {
		fs.readFile(__dirname + "/../views/charge.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				res.send(data);
			}
		});		
	});

	// get : ClubDetail
	app.get('/ClubDetail', function(req, res) {
		fs.readFile(__dirname + "/../views/ClubDetail.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else {
				res.send(data);
			}
		});		
	});

	// get : history
	app.get('/history', function(req, res) {
		fs.readFile(__dirname + "/../views/history.html", 'utf8', function(err, data) {
			if(err) console.log(err);
			else { 
				res.send(data);
			}
		});		
	});

	// get : Make QRcode
	app.get('/QRcode', function(req, res) {	
			var QR_String = 'http://chart.apis.google.com/chart?cht=qr&chs=350x350&chl=';
			var sessJson = JSON.stringify(sess);

			var sessStr = JSON.parse(sessJson, function(key, value) {
				if(key == "login_id") {
					QR_String = QR_String + value;
					console.log(QR_String);
				}
			});

		fs.readFile(__dirname + '/../views/QRcode.html', 'utf8', function(err, data) {
			if(err) console.log(err);
			//else res.send('<script>location.href = QR_String; </script>');
			else res.redirect(QR_String);
		});
	});

	// post : QRcode Data
	app.post('/QRcode_data', function(req, res) {
	
		var reqStr = JSON.stringify(req.body);	
		var reqJson = JSON.parse(reqStr, function(key, value) {
			if(key == "code") console.log(value);
			if(key == "c_num") console.log(value);
			if(key == "m_email") console.log(value);
			if(key == "pc_code") console.log(value);
		});
	});


}

