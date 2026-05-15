<div class="<?= $class; ?>">
    <label><?= $label; ?></label>
    <div class="image-upload" data-target="<?= $name ?>">

        <input type="file" name="<?= $name ?>" id="<?= $name ?>" class="image-upload-input d-none" accept="image/*">

        <div class="image-upload-preview <?= !empty($value) ? 'has-image' : '' ?>">

            <?php if (!empty($value)) { ?>

                <img src="<?= base_url($value) ?>" alt="">

                <div class="image-upload-actions">
                    <button type="button" class="btn-edit btn-upload">
                        <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="btn-remove">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

            <?php } else { ?>

                <div class="image-upload-placeholder btn-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>Clique ou arraste uma imagem</span>
                </div>

            <?php } ?>

        </div>
    </div>
</div>