<?php $titre = "Galerie"; ?>

<div class="text-white">Du blablabla</div>

<div class="d-flex flex-column">
    <section id="galerie-head" class="mb-5">
        <div class="mb-1 pb-2 pb-md-3">
            <img src="public/images/galerie/galerie_txt.png" alt="galerie">
        </div>
        <p class="text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Cum esse rerum inventore ipsum fugiat itaque. 
            Adipisci omnis, recusandae praesentium voluptatibus et, fuga, fugiat quae consequuntur enim obcaecati ex facilis a.
        </p>
    </section>

    <section id="galerie-onglets" class="d-flex flex-column justify-content-center">
        <div id="div-onglets" class="d-flex justify-content-start flex-column">
            <div id="cadre-galerie" class="">
                <picture>
                    <source srcset="public/images/galerie/xs_cadre.png" media="(max-width: 576px)">
                    <source srcset="public/images/galerie/s_cadre.png" media="(max-width: 768px)">
                    <source srcset="public/images/galerie/m_cadre.png" media="(max-width: 992px)">
                    <source srcset="public/images/galerie/l_cadre.png" media="(max-width: 1200px)">
                    <img src="public/images/galerie/xl_cadre.png" alt="cadre des onglets">
                </picture>
            </div>
            <div id="onglet1" class="zi-5">
                <picture>
                    <source srcset="public/images/galerie/xs_onglet1.png" media="(max-width: 576px)">
                    <source srcset="public/images/galerie/s_onglet1.png" media="(max-width: 768px)">
                    <source srcset="public/images/galerie/m_onglet1.png" media="(max-width: 992px)">
                    <source srcset="public/images/galerie/l_onglet1.png" media="(max-width: 1200px)">
                    <img src="public/images/galerie/xl_onglet1.png" alt="onglet Artworks">
                </picture>
            </div>
            <div id="onglet2" class="zi-3">
                <picture>
                    <source srcset="public/images/galerie/xs_onglet2.png" media="(max-width: 576px)">
                    <source srcset="public/images/galerie/s_onglet2.png" media="(max-width: 768px)">
                    <source srcset="public/images/galerie/m_onglet2.png" media="(max-width: 992px)">
                    <source srcset="public/images/galerie/l_onglet2.png" media="(max-width: 1200px)">
                    <img src="public/images/galerie/xl_onglet2.png" alt="onglet Prompts">
                </picture>
            </div>
            <div id="onglet3" class="zi-2">
                <picture>
                    <source srcset="public/images/galerie/xs_onglet3.png" media="(max-width: 576px)">
                    <source srcset="public/images/galerie/s_onglet3.png" media="(max-width: 768px)">
                    <source srcset="public/images/galerie/m_onglet3.png" media="(max-width: 992px)">
                    <source srcset="public/images/galerie/l_onglet3.png" media="(max-width: 1200px)">
                    <img src="public/images/galerie/xl_onglet3.png" alt="onglet Chimere">
                </picture>
            </div>
            <div id="onglet4" class="zi-1">
                <picture>
                    <source srcset="public/images/galerie/xs_onglet4.png" media="(max-width: 576px)">
                    <source srcset="public/images/galerie/s_onglet4.png" media="(max-width: 768px)">
                    <source srcset="public/images/galerie/m_onglet4.png" media="(max-width: 992px)">
                    <source srcset="public/images/galerie/l_onglet4.png" media="(max-width: 1200px)">
                    <img src="public/images/galerie/xl_onglet4.png" alt="onglet vide">
                </picture>
            </div>
        <div id="div-btn" class="">
            <button id="btn-ong1" class="ml-2"></button>
            <button id="btn-ong2" class=""></button>
            <button id="btn-ong3" class=""></button>
            <button id="btn-ong4" class=""></button>
        </div>
    </section>

    <div id="galerie-sections" class="">
        <section id="block-artwork" class="d-none flex-column">
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

        <section id="block-prompt" class="d-flex flex-column">
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
                        <img class="border" src="public/images/prompt/<?= $value->getImage(); ?>" alt="<?= $value->getDescription(); ?>">
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
    </div>

</div>
