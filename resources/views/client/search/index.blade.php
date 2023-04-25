<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Email Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style type="text/css">
    /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
    @media screen {
      @font-face {
        font-family: "Source Sans Pro";
        font-style: normal;
        font-weight: 400;
        src: local("Source Sans Pro Regular"),
          local("SourceSansPro-Regular"),
          url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
      }

      @font-face {
        font-family: "Source Sans Pro";
        font-style: normal;
        font-weight: 700;
        src: local("Source Sans Pro Bold"),
          local("SourceSansPro-Bold"),
          url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
      }
    }

    /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
    body,
    table,
    td,
    a {
      -ms-text-size-adjust: 100%;
      /* 1 */
      -webkit-text-size-adjust: 100%;
      /* 2 */
    }

    /**
   * Remove extra space added to tables and cells in Outlook.
   */
    table,
    td {
      mso-table-rspace: 0pt;
      mso-table-lspace: 0pt;
    }

    /**
   * Better fluid images in Internet Explorer.
   */
    img {
      -ms-interpolation-mode: bicubic;
    }

    /**
   * Remove blue links for iOS devices.
   */
    a[x-apple-data-detectors] {
      font-family: inherit !important;
      font-size: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
      color: inherit !important;
      text-decoration: none !important;
    }

    /**
   * Fix centering issues in Android 4.4.
   */
    div[style*="margin: 16px 0;"] {
      margin: 0 !important;
    }

    body {
      width: 100% !important;
      height: 100% !important;
      padding: 0 !important;
      margin: 0 !important;
    }

    /**
   * Collapse table borders to avoid space between cells.
   */
    table {
      border-collapse: collapse !important;
    }

    a {
      color: #5ea700;
    }

    img {
      height: auto;
      line-height: 100%;
      text-decoration: none;
      border: 0;
      outline: none;
    }

    .preheader {
      display: none;
      max-width: 0;
      max-height: 0;
      overflow: hidden;
      font-size: 1px;
      line-height: 1px;
      color: #fff;
      opacity: 0;
    }
  </style>
</head>

<body style="background-color: #e9ecef">
  <!-- start preheader -->
  <div class="preheader">
    Green Market
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- start logo -->
    <tr>
      <td align="center" valign="top" style="padding: 36px 24px">
        <a href="https://www.blogdesire.com" target="_blank" style="display: inline-block">
          <img src="{{asset('img/logo.png')}}" alt="Logo" border="0" width="90" style="
                                            display: block;
                                            width: 120px;
                                            max-width: 120px;
                                            min-width: 120px;
                                        " />
        </a>
      </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#e9ecef">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px">
          <tr>
            <td align="left" bgcolor="#ffffff" style="
                                    padding: 24px;
                                    font-family: 'Source Sans Pro', Helvetica,
                                        Arial, sans-serif;
                                    font-size: 16px;
                                    line-height: 24px;
                                ">
                                <p style="margin-top:0px">
                                  Dear ngài
                  
                                </p>
              <p style="margin: 0">
                Nhấn vào nút bên dưới để xác nhận địa chỉ email của bạn. Nếu bạn không muốn tạo tài
                khoản bằng email này vui lòng bỏ qua email xác nhận này từ chúng tôi

              </p>
            </td>
          </tr>
          <tr>
            <td align="left" bgcolor="#ffffff" style="
                                    padding: 24px;
                                    font-family: 'Source Sans Pro', Helvetica,
                                        Arial, sans-serif;
                                    font-size: 16px;
                                    line-height: 24px;
                                    border-bottom: 3px solid #d4dadf;
                                ">
              <p style="margin: 0">
                Green Market
              </p>
            </td>
          </tr>
          <!-- end copy -->
        </table>
      </td>
    </tr>

    <tr>
      <td align="center" bgcolor="#e9ecef" style="padding: 24px">

        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px">
          <!-- start permission -->
          <tr>
            <td align="center" bgcolor="#e9ecef" style="
                                    padding: 12px 24px;
                                    font-family: 'Source Sans Pro', Helvetica,
                                        Arial, sans-serif;
                                    font-size: 14px;
                                    line-height: 20px;
                                    color: #666;
                                ">
              <p style="margin: 0">
                You received this email because we received
                a request for [type_of_action] for your
                account. If you didn't request
                [type_of_action] you can safely delete this
                email.
              </p>
            </td>
          </tr>
          <!-- end permission -->

          <!-- start unsubscribe -->
          <tr>
            <td align="center" bgcolor="#e9ecef" style="
                                    padding: 12px 24px;
                                    font-family: 'Source Sans Pro', Helvetica,
                                        Arial, sans-serif;
                                    font-size: 14px;
                                    line-height: 20px;
                                    color: #666;
                                ">
              <p style="margin: 0">
                To stop receiving these emails, you can
                <a href="https://www.blogdesire.com" target="_blank">unsubscribe</a>
                at any time.
              </p>
              <p style="margin: 0">
                Paste 1234 S. Broadway St. City, State 12345
              </p>
            </td>
          </tr>
          <!-- end unsubscribe -->
        </table>
      </td>
    </tr>
    <!-- end footer -->
  </table>
  <!-- end body -->
</body>

</html>