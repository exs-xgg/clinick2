
          </div>

        </div>
  </body>
  <script src="/js/app.js" type="text/javascript"></script>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
</html>
