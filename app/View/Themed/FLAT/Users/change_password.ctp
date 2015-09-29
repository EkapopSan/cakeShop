<fieldset>
    <legend>Edit::<span class="base-blue"><?php echo $user['User']['username'] ?></span>::<span class="gray-light">Password</span>
    </legend>
    <?php echo $this->Form->create('User'); ?>
    <?php echo $this->Form->input('User.id', array('default' => $user['User']['id'])); ?>
    <?php echo $this->Form->input('User.password', array('type' => 'password')); ?>
    <?php echo $this->Form->input('User.passwordConfirm', array('type' => 'password')); ?>
    <?php echo $this->Form->end(); ?>
</fieldset>

<script>
    $(function () {

        $('body').on('hidden.bs.modal', '#changePasswordModal', function (event) {
            $('#changePasswordModal').find('.modal-footer').find('.pull-left').empty();
        });

        $('#UserChangePasswordForm').validate({
            ignore: [],
            rules: {
                'data[User][password]': {
                    required: true,
                    minlength: 5,
                    maxlength: 32
                },
                'data[User][passwordConfirm]': {
                    required: true,
                    minlength: 5,
                    maxlength: 32,
                    equalTo: "#UserPassword"
                }
            },
            submitHandler: function (form) {

                ajaxPageLoader.show();

                $.ajax({
                    url: $(form).attr('action') + '.json',
                    type: "POST",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#changePasswordModal').find('.modal-footer').find('.pull-left').html('<span class="badge badge-success hide"><i class="icon-ok"></i> Successfully</span>');
                        $('#changePasswordModal').find('.modal-footer').find('.pull-left').find('.badge').fadeIn('fast');
                        ajaxPageLoader.hide();
                    },
                    error: function () {
                    }
                });
            },
            success: function () {
            }
        });
    });
</script>