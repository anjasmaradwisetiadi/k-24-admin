@extends('layouts.main')
@push('script')
    <script src="{{ asset('js/member-list.js') }}" rel="stylesheet"></script>
@endpush

@section('container')
<div id="Member-List-Json">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Member List Json</h3>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {{ $users->links() }}
        </div>
    </div>
    <div id="member-list-json">

    </div>
</div>
<script type="module">
    // be sure to specify the exact version
    import { codeToHtml } from 'https://esm.sh/shiki@1.0.0'

    const viewJson = document.getElementById('member-list-json')
    const dataMember = `
        <?php echo json_encode($users,JSON_PRETTY_PRINT); ?>; 
    `.trim()

    console.log(dataMember);
    viewJson.innerHTML = await codeToHtml(`${dataMember}`, {
        lang: 'json',
        theme: 'catppuccin-mocha'
    })
</script>
@endsection