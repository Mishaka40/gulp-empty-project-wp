</main>
<?php
$footer = get_field('footer', 'option');

?>
<footer class="footer">
    <div class="container">
    
    </div>
</footer>

<div style="display: none;">

</div>

<script>
    const TEMPLATE_PATH = '<?=TEMPLATE_PATH?>'
    let validationErrors = {
        "required": "This field is required",
        "invalid": "This field is invalid",
        "allowed_ext": "Allowed extensions: &1",
        "max_size": "Maximum file size is &1",
        "max_files": "Maximum files you can upload is &1",
        "minlength": "Minimum number of characters is &1",

        "firstname": {
            "required": "First Name is required."
        },
        "lastname": {
            "required": "Last Name is required."
        },
        "name": {
            "regex": "Only letters and white space allowed"
        },
        "email": {
            "regex": "The E-mail must be a valid email address.",
            "required": "E-mail is required."
        },
        "zipcode": {
            "required": "Postcode is required."
        },
        "language": {
            "required": "Language is required."
        },
        "city": {
            "required": "City is required."
        },
        "phone": {
            "required": "Phone is required."
        },
        "password": {
            "minlength": "Minimum number of characters is &1",
            "regex": "The password must contain numbers and Latin letters",
        },
        "password_repeat": {
            "password_repeat": "Passwords don't match"
        },
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="<?=TEMPLATE_PATH?>/js/common.js"></script>
<script src="<?=TEMPLATE_PATH?>/js/main.js"></script>

</div>
</body>
<?php wp_footer(); ?>

</html>