<div class="onex-table-box">
    @if(Session::has('onexSysinfoAdminAccessEnabled') && Session::get('onexSysinfoAdminAccessEnabled') == 'YES')
        <div class="text-right" style="margin-bottom: 10px;"><a class="onexlogout" href="{{ route('onexsysinfoAdminLogout') }}">Close/Logout</a></div>
    @endif
    <table class="onex-table">
        <thead>
            <tr>
                <th class="text-center">PHP VERSION</th>
                <th class="text-center">LARAVEL VERSION</th>
                <th class="text-center">MYSQL VERSION</th>
            </tr>
            <tr>
                <td class="text-center text-xl">@if(!empty($versions['php'])){{ $versions['php'] }}@endif</td>
                <td class="text-center text-xl">@if(!empty($versions['laravel'])){{ $versions['laravel'] }}@endif</td>
                <td class="text-center text-xl">@if(!empty($versions['mysql'])){{ $versions['mysql'] }}@else <span style="color: red;">DB not connected!</span> @endif</td>
            </tr>
        </thead>
    </table>
    <div class="text-center mt-3">
        <h3 class="onex-tag-title">Laravel Informations</h3>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">PATH INFO</th>
            </tr>
            @if(!empty($paths))
                @foreach($paths as $k => $v)
                <tr>
                <td class="text-left w-40"><strong>{{ $k }}</strong></td>
                <td class="text-left w-60 f-15">{{ $v }}</td>
                </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">IS WRITABLE</th>
            </tr>
            @if(!empty($is_writable))
                @foreach($is_writable as $k => $v)
                <tr>
                <td class="text-left w-40"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></td>
                <td class="text-left w-60 f-15">{{ $v }}</td>
                </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">ENV VARIABLES</th>
            </tr>
            @if(!empty($is_env_exist) && $is_env_exist == 'NO')
            <tr>
                <td colspan="2" class="text-center">.env file is missing or yet not generated!</td>
            </tr>
            @endif
            @if(!empty($env_variables))
                @foreach($env_variables as $k => $v)
                <tr>
                <td class="text-left w-40"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></td>
                <td class="text-left w-60 f-15">{{ $v }}</td>
                </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">USING PACKAGES</th>
            </tr>
            @if(!empty($require_packages))
                @php unset($require_packages['php']) @endphp
                @foreach($require_packages as $k => $v)
                <tr>
                <td class="text-left w-40"><strong>{{ $k }}</strong></td>
                <td class="text-left w-60 f-15">{{ $v }}</td>
                </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">USING PACKAGES - DEV</th>
            </tr>
            @if(!empty($dev_packages))
                @foreach($dev_packages as $k => $v)
                <tr>
                <td class="text-left w-40"><strong>{{ $k }}</strong></td>
                <td class="text-left w-60 f-15">{{ $v }}</td>
                </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <h3 class="onex-tag-title">PHP Informations</h3>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="2" class="text-center">SERVER INFO</th>
            </tr>
            @if(!empty($server_info))
                @foreach($server_info as $k => $v)
                    <tr>
                        <td class="text-left w-40"><strong>{{ $k }}</strong></td>
                        <td class="text-left w-60 f-15">{{ $v }}</td>
                    </tr>
                @endforeach
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="5" class="text-center">ENABLED EXTENSIONS ({{count($enabled_extension)}})</th>
            </tr>
            @if(!empty($enabled_extension) && count($enabled_extension))
                <tr>
                @foreach($enabled_extension as $k => $v)
                @if($k % 5 == 0) <tr></tr> @endif
                <td>{{ $v }}</td>
                @endforeach
                </tr>
            @endif
            </thead>
        </table>
    </div>
    <div class="text-center mt-3">
        <h3 class="onex-tag-title">MYSQL INFORMATIONS</h3>
    </div>
    <div class="text-center mt-3">
        <table class="onex-table">
            <thead>
            <tr>
                <th colspan="5" class="text-center">ALL TABLE NAMES ({{count($mysql_tables)}})</th>
            </tr>
            @if(!empty($mysql_tables) && count($mysql_tables))
                <tr>
                @foreach($mysql_tables as $k => $v)
                @if($k % 5 == 0) <tr></tr> @endif
                <td>{{ $v }}</td>
                @endforeach
                </tr>
            @endif
            </thead>
        </table>
    </div>
</div>