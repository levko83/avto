{$this->beginContent('//layouts/main')}
    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front drive");
        });
    </script>
    {$content}
{$this->endContent()}
