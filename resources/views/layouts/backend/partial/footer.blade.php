<!-- Main Footer -->
<footer class="main-footer">
    @if (session('locale') == 'en')
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Copyright &copy; 2021
        </div>
    @endif

    @if (session('locale') == 'hi')
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            कॉपीराइट &copy; 2021
        </div>
    @endif

    <!-- Default to the left -->
    <strong style="font-weight: 500;">Powered By <a href="https://blueoceantech.in/" target="_blank" style="font-weight: 600;">Blue Ocean Tech Solutions Pvt. Ltd.</a></strong> All rights reserved.
</footer>
