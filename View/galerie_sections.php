<section id="block-artwork" class="d-flex flex-column">
            <div>
                <h1 class="text-white">Artworks</h1>
            </div>
            <?php if( isset($_SESSION['admin']) ): ?>
            <div class="row m-2">
                <button data-toggle="collapse" data-target="#form-artwork" class="btn col-12">Ajouter une image</button>
                <div id="form-artwork" class="collapse py-2 col-12 border rounded">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image" accept="image/*" maxlength="50" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" minlength="5" maxlength="80" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" minlength="5" maxlength="200" placeholder="Mediums" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="alt_artwork" class="form-control" minlength="5" maxlength="150" placeholder="Contenu du 'alt'" required>
                        </div>
                        <input type="submit" name="addArtwork" class="btn btn-primary" value="Ajouter">
                    </form>
                </div>
            </div>
            <?php endif; ?>
            <ul id="" class="d-flex justify-content-around flex-wrap">
                <?php foreach($data_art as $key => $value): ?>
                <li>
                    <button class="<?= ++$num1; ?>">
                        <img src="public/images/artwork/<?= $value->getImage(); ?>" alt="<?= $value->getAlt_artwork(); ?>" class="mini-illu p-2 mb-1">
                    </button> 
                </li>
                <?php endforeach; ?>
            </ul>
            
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div>
                        <?php foreach($data_art as $key => $value): ?>
                        <div class="mySlides">
                            <img src="public/images/artwork/<?= $value->getImage(); ?>" alt="<?= $value->getAlt_artwork(); ?>" class="p-2 mb-1">
                            
                            <div class="caption-container">
                                <p><?= $value->getTitle(); ?></p>
                                <small><em><?= $value->getDescription(); ?></em></small>
                            </div>
                            <?php if( isset($_SESSION['admin']) ): ?>
                            <div class="edit-ctrl row text-right">
                                <div class="col-12">
                                    <button id="btn-art-edit-<?= $num1; ?>" class="btn border border-success" data-toggle="collapse" data-target="#form-editArt<?= $value->getId_artwork(); ?>"><i class="fa fa-edit fa-lg text-success"></i></button>
                                </div>
                                <div class="col-12">
                                    <button class="btn border border-danger"><a onclick="return confirm('Supprimer ?');" href="?deleteArtwork&art=<?= $value->getId_artwork(); ?>"><i class="fa fa-trash fa-lg text-danger"></i></a></button>
                                </div>
                                </div>
                            <div id="form-editArt<?= $value->getId_artwork(); ?>" class="collapse py-2 col-12 border rounded">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_artwork" value="<?= $value->getId_artwork(); ?>">
                                    <input type="hidden" name="image" value="<?= $value->getImage(); ?>">
                                    <div class="form-group">
                                        <input type="file" name="image" accept="image/*" maxlength="50" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" maxlength="80" placeholder="Titre" value="<?= $value->getTitle(); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="description" class="form-control" maxlength="200" placeholder="Mediums" value="<?= $value->getDescription(); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="alt_artwork" class="form-control" maxlength="150" placeholder="Contenu du 'alt'" value="<?= $value->getAlt_artwork(); ?>" required>
                                    </div>
                                    <input type="submit" name="editArtwork" class="btn btn-primary" value="Modifier">
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <a id="prev">&#10094;</a>
                    <a id="next">&#10095;</a>

                </div>
            </div>

        </section>

        <section id="block-prompt" class="d-none flex-column">
            <div>
                <h1 class="text-white">Promptnawak</h1>
            </div>
            <?php if( isset($_SESSION['admin']) ): ?>
            <div class="row m-2">
                <button data-toggle="collapse" data-target="#form-prompt" class="btn col-12">Ajouter un prompt</button>
                <div id="form-prompt" class="collapse py-2 col-12 border rounded">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image" accept="image/*" maxlength="70" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" minlength="5" maxlength="200" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" minlength="3" maxlength="30" placeholder="Auteur" required>
                        </div>
                        <input type="submit" name="addPrompt" class="btn btn-primary" value="Ajouter">
                    </form>
                </div>
            </div>
            <?php endif; ?>
            <div class="">
                <div id="btns-prompt" class="">
                    <?php foreach($data_prompt as $key => $value): ?>
                    <button id="<?= $value->getId_prompt(); ?>" class="btn d-inline"><?= $value->getDescription(); ?></button>
                    <?php endforeach; ?>
                </div>
                
                <div class="">
                    <?php foreach($data_prompt as $key => $value): ?>
                    <div id="prompt-<?= $value->getId_prompt(); ?>" class="d-none">
                        <img class="border rounded-circle" src="public/images/prompt/<?= $value->getImage(); ?>" alt="<?= $value->getDescription(); ?>">
                        <?php if( isset($_SESSION['admin']) ): ?>
                        <div class="edit-ctrl row text-right">
                            <div class="col-12">
                                <button id="btn-prompt-edit-<?= ++$num1; ?>" class="btn border border-success" data-toggle="collapse" data-target="#form-editPrompt<?= $value->getId_prompt(); ?>"><i class="fa fa-edit fa-lg text-success"></i></button>
                            </div>
                            <div class="col-12">
                                <button class="btn border border-danger"><a onclick="return confirm('Supprimer ?');" href="?deletePrompt&pr=<?= $value->getId_prompt(); ?>"><i class="fa fa-trash fa-lg text-danger"></i></a></button>
                            </div>
                        </div>
                        <div id="form-editPrompt<?= $value->getId_prompt(); ?>" class="collapse py-2 col-12 border rounded">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_prompt" value="<?= $value->getId_prompt(); ?>">
                                <input type="hidden" name="image" value="<?= $value->getImage(); ?>">
                                <div class="form-group">
                                    <input type="file" name="image" accept="image/*" maxlength="70" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control" maxlength="80" placeholder="Description" value="<?= $value->getDescription(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="author" class="form-control" maxlength="200" placeholder="Auteur" value="<?= $value->getAuthor(); ?>" required>
                                </div>
                                <input type="submit" name="editPrompt" class="btn btn-primary" value="Modifier">
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="block-chimere" class="d-none">
            <div class="text-white">Chimère Builder</div>
        </section>

        <section id="block-later" class="d-none">
            <div class="text-white">Rien pour le moment</div>
        </section>