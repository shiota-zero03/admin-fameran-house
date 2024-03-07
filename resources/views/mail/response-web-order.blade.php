<style>
    #app{
        background: #f8f9fa;
        padding: 24px 24px;
    }
    .content{
        background: #ffffff;
        padding: 24px 24px;
        border-radius: 10px;
    }
    .header-message{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .body-message{
        line-height: 28px;
    }
</style>
<div id="app">
    <div class="content">
        <div class="header-message">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" width="75px">
            <div style="margin-left: 15px">
                <h2 style="margin: 0">FAMERAN HOUSE</h2>
                <small><em>Cafee and Multimedia</em></small>
            </div>
        </div>
        <hr style="margin: 15px 0">
        <div class="body-message">
            Halo {{ $data['name'] }}<br /><br />
            Terimakasih telah menghubungi FAMERAN HOUSE.<br />
            Dengan senang hati kami menginformasikan bahwa kami telah menerima pesan anda dan akan kami tindak lanjuti. <br /><br />

            Berikut adalah pesan yang anda kirimkan kepada kami:<br />
            <table>
                <tr>
                    <th style="text-align: left">Nama</th>
                    <td style="text-align: left">&nbsp;&nbsp; : &nbsp;&nbsp;{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <th style="text-align: left">Email</th>
                    <td style="text-align: left">&nbsp;&nbsp; : &nbsp;&nbsp;{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th style="text-align: left">Whatsapp</th>
                    <td style="text-align: left">&nbsp;&nbsp; : &nbsp;&nbsp;{{ $data['whatsapp'] }}</td>
                </tr>
                <tr>
                    <th style="text-align: left">Institusi</th>
                    <td style="text-align: left">&nbsp;&nbsp; : &nbsp;&nbsp;{{ $data['institution'] }}</td>
                </tr>
                <tr>
                    <th style="text-align: left">Pesan</th>
                    <td style="text-align: left">&nbsp;&nbsp; : &nbsp;&nbsp;{{ $data['message'] }}</td>
                </tr>
            </table><br /><br />
            Berdasarkan pesan yang telah anda kirim sebelumnya, berikut balasan yang diberikan oleh tim kami : <br /><br />
            {{ $data['response'] }}<br /><br />
            Terima kasih atas partisipasi anda dengan mengirimkan pesan kepada kami, silahkan beri tanggapan dengan membalas pesan ini.<br />

            Salam,<br /><br />

            FAMERAN HOUSE
        </div>
        <hr style="margin: 15px 0">
        <div class="footer-message" style="text-align: center;>
            <small><em>copyright &copy; {{ date('Y') }}. Fameran House</em></small>
        </div>
    </div>
</div>
