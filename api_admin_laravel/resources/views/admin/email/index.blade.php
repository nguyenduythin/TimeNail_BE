<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Email Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
        @media screen {
            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }

            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 700;
                src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
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
            color: #1a82e2;
        }

        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }
    </style>

</head>
@php
    $bill = App\Models\Bill::find($id);
    $bill->load('user');
    $detail_bill = App\Models\BillMember::where('bill_id', $id)->orderBy('number_member')->get();
    foreach ($detail_bill as $c) {
        if($c->number_member == 1){
            if ($c->service_id != 'null') {
                $service1 = App\Models\Service::whereIn('id', json_decode($c->service_id))->get();
            }
            if ($c->combo_id != 'null') {
                $combo1 = App\Models\Combo::whereIn('id', json_decode($c->combo_id))->get();
            }
            $staff1 = App\Models\User::find($c->staff_id);
        }
        if($c->number_member == 2){
            if ($c->service_id != 'null') {
                $service2 = App\Models\Service::whereIn('id', json_decode($c->service_id))->get();
            }
            if ($c->combo_id != 'null') {
                $combo2 = App\Models\Combo::whereIn('id', json_decode($c->combo_id))->get();
            }
            $staff2 = App\Models\User::find($c->staff_id);
        }
        if($c->number_member == 3){
            if ($c->service_id != 'null') {
                $service3 = App\Models\Service::whereIn('id', json_decode($c->service_id))->get();
            }
            if ($c->combo_id != 'null') {
                $combo3 = App\Models\Combo::whereIn('id', json_decode($c->combo_id))->get();
            }
            $staff3 = App\Models\User::find($c->staff_id);
        }
    }
@endphp

<body style="background-color: #D2C7BA;">

    <!-- start preheader -->
    <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
        A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
    </div>
    <!-- end preheader -->

    <!-- start body -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <!-- start logo -->
        <tr>
            <td align="center" bgcolor="#D2C7BA">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 36px 24px;">
                            <!-- <a href="https://sendgrid.com" target="_blank" style="display: inline-block;">
                                <img src="{{asset('storage/images/email/paste-logo-light@2x.png')}}" alt="Logo" border="0" width="48" style="display: block; width: 48px; max-width: 48px; min-width: 48px;">
                            </a> -->
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end logo -->

        <!-- start hero -->
        <tr>
            <td align="center" bgcolor="#D2C7BA">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: Arial, sans-serif; border-top: 3px solid #d4dadf;">
                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Cảm ơn bạn đã đặt lịch !</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end hero -->

        <!-- start copy block -->
        <tr>
            <td align="center" bgcolor="#D2C7BA">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                    <!-- start copy -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">Đây là chi tiết tổng hóa đơn của bạn. Nếu có thắc mắc gì về hóa đơn của mình, hãy liên hệ với chúng tôi</a>.</p>
                        </td>
                    </tr>
                    <!-- end copy -->

                    <!-- start receipt table -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left" bgcolor="#D2C7BA" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Mã Hóa Đơn</strong></td>
                                    <td align="left" bgcolor="#D2C7BA" width="25%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>{{$bill->code_bill}}</strong></td>
                                </tr>
                                <tr>
                                    <td align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Tên Khách Hàng</strong></td>
                                    <td align="left" width="25%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>{{$bill->user->full_name}}</strong></td>
                                </tr>
                                <tr>
                                    <td align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Ngày Đặt</strong></td>
                                    <td align="left" width="25%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>{{$bill->date_work}}</strong></td>
                                </tr>
                                <tr>
                                    <td align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Thời Gian</strong></td>
                                    <td align="left" width="25%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>{{$bill->time_work}}</strong></td>
                                </tr>
                                @php $tong = 0; @endphp
                                @if(isset($combo1) || isset($service1))
                                <th align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">Khách 1</th>
                                @if(isset($combo1))
                                @foreach($combo1 as $c)
                                @php $tong += $c->total_price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Combo : </strong>{{$c->name_combo}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->total_price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                @if(isset($service1))
                                @foreach($service1 as $c)
                                @php $tong += $c->price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Dịch Vụ : </strong>{{$c->name_service}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Nhân Viên Phục Vụ</strong></td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{$staff1->full_name}}</td>
                                </tr>
                                @endif
                                
                                @if(isset($combo2) || isset($service2))
                                <th align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">Khách 2</th>
                                @if(isset($combo2))
                                @foreach($combo2 as $c)
                                @php $tong += $c->total_price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Combo : </strong>{{$c->name_combo}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->total_price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                @if(isset($service2))
                                @foreach($service2 as $c)
                                @php $tong += $c->price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Dịch Vụ : </strong>{{$c->name_service}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Nhân Viên Phục Vụ</strong></td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{$staff2->full_name}}</td>
                                </tr>
                                @endif

                                @if(isset($combo3) || isset($service3))
                                <th align="left" width="75%" style="padding: 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">Khách 3</th>
                                @if(isset($combo3))
                                @foreach($combo3 as $c)
                                @php $tong += $c->total_price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Combo : </strong>{{$c->name_combo}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->total_price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                @if(isset($service3))
                                @foreach($service3 as $c)
                                @php $tong += $c->price; @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong> Dịch Vụ : </strong>{{$c->name_service}}</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{number_format($c->price)}}₫</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;"><strong>Nhân Viên Phục Vụ</strong></td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">{{$staff3->full_name}}</td>
                                </tr>
                                @endif
                                
                                @if($bill->code_discount != '')
                                @php
                                $discount = \App\Models\Discount::where('code_discount',$bill['code_discount'])->first();
                                @endphp
                                <tr>
                                    <td align="left" width="75%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA; border-bottom: 4px dashed #D2C7BA;">Giảm Giá</td>
                                    <td align="left" width="25%" style="padding: 6px 12px;font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA; border-bottom: 4px dashed #D2C7BA;">{{number_format($tong/100*$discount['percent'])}}₫</td>
                                </tr>
                                @endif
                                <tr>
                                    <td align="left" width="75%" style="padding: 12px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 4px dashed #D2C7BA; border-bottom: 4px dashed #D2C7BA;"><strong>Tổng Tiền</strong></td>
                                    @if(isset($discount))
                                    <td align="left" width="25%" style="padding: 12px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 2px dashed #D2C7BA; border-bottom: 4px dashed #D2C7BA;"><strong>{{number_format($tong-($tong/100*$discount['percent']))}}₫</strong></td>
                                    @else
                                    <td align="left" width="25%" style="padding: 12px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; border-top: 4px dashed #D2C7BA; border-bottom: 4px dashed #D2C7BA;"><strong>{{number_format($tong)}}₫</strong></td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- end reeipt table -->

                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end copy block -->

        <!-- start receipt address block -->
        <tr>
            <td align="center" bgcolor="#D2C7BA" valign="top" width="100%">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size: 0; border-bottom: 3px solid #d4dadf">
                            <!--[if (gte mso 9)|(IE)]>
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
              <tr>
              <td align="left" valign="top" width="300">
              <![endif]-->
                            <div style="display: inline-block; width: 100%; max-width: 50%; min-width: 240px; vertical-align: top;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 300px;">
                                    <tr>
                                        <td align="left" valign="top" style="padding-bottom: 36px; padding-left: 36px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                            <p><strong>Địa Chỉ Cửa Hàng</strong></p>
                                            <p>66 Hồ Tùng Mậu<br>Mai Dịch<br>Cầu Giấy, Hà Nội</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if (gte mso 9)|(IE)]>
              </td>
              <td align="left" valign="top" width="300">
              <![endif]-->
                            <div style="display: inline-block; width: 100%; max-width: 50%; min-width: 240px; vertical-align: top;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 300px;">
                                    <tr>
                                        <td align="left" valign="top" style="padding-bottom: 36px; padding-left: 36px; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px;">

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if (gte mso 9)|(IE)]>
              </td>
              </tr>
              </table>
              <![endif]-->
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end receipt address block -->

        <!-- start footer -->
        <tr>
            <td align="center" bgcolor="#D2C7BA" style="padding: 24px;">
                <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                    <!-- start permission -->
                    <tr>
                        <td align="center" bgcolor="#D2C7BA" style="padding: 12px 24px; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                            <p style="margin: 0;">Đây là email tự động được gửi sau khi bạn đặt lịch. Vui lòng không trả lời email này</p>
                        </td>
                    </tr>
                    <!-- end permission -->

                    <!-- start unsubscribe -->
                    <tr>
                        <td align="center" bgcolor="#D2C7BA" style="padding: 12px 24px; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                            <p style="margin: 0;">Thông Tin Liên Hệ</p>
                            <p style="margin: 0;">Email: timenailteam@gmail.com -- SDT: 0988 674 367</p>
                        </td>
                    </tr>
                    <!-- end unsubscribe -->

                </table>
                <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
            </td>
        </tr>
        <!-- end footer -->

    </table>
    <!-- end body -->

</body>

</html>