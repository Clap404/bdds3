<?php
    ob_start();
    
    if(isset($_GET['desc'])) {
        $desc = ($_GET['desc'] === "1" ? true : false);
    }
    else{
        $desc = false;
    }

    if(isset($_GET['order'])) {
        switch($_GET['order']) {
            case "date_manif":
                $table_profil = get_profil_date($desc);
            break;

            case "nom_epreuve":
                $table_profil = get_profil_epreuve($desc);
            break;

            case "resultat":
                $table_profil = get_profil_resultat($desc);
            break;

            case "nom_manif":
                $table_profil = get_profil_nom_manif($desc);
            break;
        }
    }
    else {
        $table_profil = get_profil_date($desc);
    }

    $liste_epreuves = liste_deroulante_epreuve();
?>
    <script type="text/javascript">
        window.onload = function(){
            document.querySelector("tr#edit").style.display = "none";
            bindActionBySelector(showEditForm, ".edit");    
        }
    </script>
    <div class="previous">
            <a href="?p=etudiants">Étudiants</a> / <span class="subsection"><?= $nom_etu ?></span>
        <br />
    </div>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td><a href=<?='"?p=profilEtu&amp;idEtu='.$_GET["idEtu"].'&amp;order=nom_manif&amp;desc='.(int)!$desc.'"'?>>Manifestation</a></td>
                <td><a href=<?='"?p=profilEtu&amp;idEtu='.$_GET["idEtu"].'&amp;order=date_manif&amp;desc='.(int)!$desc.'"'?>>Date</a></td>
                <td><a href=<?='"?p=profilEtu&amp;idEtu='.$_GET["idEtu"].'&amp;order=nom_epreuve&amp;desc='.(int)!$desc.'"'?>>Épreuve</a></td>
                <td><a href=<?='"?p=profilEtu&amp;idEtu='.$_GET["idEtu"].'&amp;order=resultat&amp;desc='.(int)!$desc.'"'?>>Résultat</a></td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr id="edit">
                <form action=<?= '"?p=profilEtu&amp;idEtu='.$_GET['idEtu'].'"'?> method="post">
                    <td><input name="idParticipation" type="hidden"/></td>
                    <td><input type="text" disabled="disabled"/></td>
                    <td><input type="text" disabled="disabled"/></td>
                    <td><input type="text" disabled="disabled"/></td>
                    <td><input name="resultat" type="text" class="withSuffix"/></td>
                    <input name="idEtu" type="hidden" value=<?= '"'.$_GET['idEtu'].'"' ?> />
                    <input name="act" type="hidden" value="modif" />
                    <td><input type="submit" value="Modifier" /></td>
                </form>
            </tr>
            <tr id="add">
                <form action=<?= '"?p=profilEtu&amp;idEtu='.$_GET['idEtu'].'"'?> method="post">
                    <td></td>
                    <td colspan=3>
                        <select name="idParticipation" style="width:100%;">
                            <?php
                                $olddate = "";
                                foreach ($liste_epreuves as $key => $value) {
                                    if ($value[2] !== $olddate) {
                                        echo '<option>==='.$value[2].'===</option>';
                                        $olddate = $value[2];
                                    }
                                    echo '<option value="'.$value[3].' '.$value[4].'">'.$value[0].' - '.$value[1].'</option>';
                                }
                            ?>
                            
                        </select>
                    </td>
                    <td><input name="resultat" type="text" placeholder="nombre de points"/></td>
                    <input name="idEtu" type="hidden" value=<?= '"'.$_GET['idEtu'].'"' ?> />
                    <input name="act" type="hidden" value="add"/>
                    <td><input type="submit" value="Ajouter"/></td>
                </form>
            </tr>
<?php
            foreach ($table_profil as $key => $value) {
?>
                
                <tr id=<?= '"x'.$key.'"' ?>>
                    <td><?= $value[4]." ".$value[5] ?></td>
                    <td><?= $value[0] ?></td>
                    <td><?= $value[1] ?></td>
                    <td><?= $value[2] ?></td>
                    <td><?= $value[3] < 2 ? $value[3]." point" : $value[3]." points"?></td>
                    <td>
                        <a class="edit" id=<?= '"x'.$key.'"' ?>><img src="public/images/edit.png" class="icon"/></a>
                        <a href=<?= '"?p=profilEtu&amp;idEtu='.$_GET['idEtu'].'&amp;idManif='.$value[4].'&amp;idEpreuve='.$value[5].'&amp;act=delete"'
                            ?> class="delete" id=<?= '"x'.$key.'"' ?>><img
                            src="public/images/delete.png" class="icon"/></a>
                    </td>
                </tr>
<?php
            }
?>
        </tbody>
    </table>
<?php
    $content = ob_get_clean();

