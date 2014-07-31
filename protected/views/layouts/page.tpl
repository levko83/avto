{$this->beginContent('//layouts/main')}
    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front {$this->page_type}");
        });
    </script>
    {$content}
{$this->endContent()}
