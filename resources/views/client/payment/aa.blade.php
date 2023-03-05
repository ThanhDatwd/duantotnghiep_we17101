<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gửi tin nhắn SMS</title>
  </head>
  <body>
    <h1>Gửi tin nhắn SMS</h1>
    <label for="phone-number">Số điện thoại:</label>
    <input type="tel" id="phone-number" name="phone-number" placeholder="Nhập số điện thoại">
    <br><br>
    <label for="message">Tin nhắn:</label>
    <input type="text" id="message" name="message" placeholder="Nhập nội dung tin nhắn">
    <br><br>
    <button onclick="sendMessage()">Gửi tin nhắn</button>
    <br><br>
    <div id="response"></div>
  </body>
</html>
<script>
	function sendMessage() {
  const phoneNumber = document.getElementById('phone-number').value;
  const message = document.getElementById('message').value;

  // Gọi API Amazon SNS để gửi tin nhắn SMS
  fetch('/send-sms', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      phoneNumber: phoneNumber,
      message: message
    })
  })
  .then(response => response.json())
  .then(data => {
    // Hiển thị kết quả trả về từ API
    document.getElementById('response').textContent = data.message;
  })
  .catch(error => {
    // Hiển thị thông báo lỗi nếu có
    document.getElementById('response').textContent = 'Lỗi: ' + error.message;
  });
}

</script>