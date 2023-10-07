<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ env('APP_NAME') }} | ONEX - SYSINFO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.41, maximum-scale=1" />
  @include('sysinfo::assets.style')
</head>
<body>
  <div class="onex-container">
    <div class="onex-title-box">
      <h3 class="onex-title">ONEX - SYSTEM - ENVIRONMENT</h3>
    </div>

    <!-- Admin Access Area -->
    @if(!empty($onexSysinfoConfig['authentication']['is_enabled']) && $onexSysinfoConfig['authentication']['is_enabled'] && Session::get('onexSysinfoAdminAccessEnabled') == 'NO')
      @include('sysinfo::system-access')
    @endif

    <!-- SYSTEM INFORMTION AREA -->
    @if(!$onexSysinfoConfig['authentication']['is_enabled'] || (Session::has('onexSysinfoAdminAccessEnabled') && Session::get('onexSysinfoAdminAccessEnabled') == 'YES'))
      @include('sysinfo::system-information')
    @endif
  </div>
</body>
</html>
