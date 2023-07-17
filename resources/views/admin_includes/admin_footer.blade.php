
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>

        {{-- Important main wrap div --}}
    </div>
        {{-- Important main wrap div --}}

    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script type="text/javascript">
        @if (session('success'))
            toastr.success('{{ session('success') }}', 'Success', {
                timeOut: 2000
            });
        @endif
    
        @if (session('warning'))
            toastr.warning('{{ session('warning') }}', {
                timeOut: 2000
            });
        @endif
    
        @if (session('fail'))
            toastr.error('{{ session('fail') }}', {
                timeOut: 2000
            });
        @endif
    
        @if (session('primary'))
            toastr.primary('{{ session('primary') }}', {
                timeOut: 2000
            });
        @endif
    
        @if (session('message'))
            toastr.message('{{ session('message') }}', {
                timeOut: 2000
            });
        @endif
    
        @if (session('info'))
            toastr.info('{{ session('info') }}', {
                timeOut: 2000
            });
        @endif
    </script>
    

</body>

</html>