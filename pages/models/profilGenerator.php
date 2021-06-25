<?php

require("../fpdf/fpdf.php");

class PDFGenerator extends FPDF
{
    // En-tête
    function HeaderPDF(
        $domaineEtablissement,
        $nom,
        $prenom,
        $matricule,
        $dateNaiss,
        $lieuNaiss,
        $mention,
        $niveau,
        $parcours,
        $cycles,
        $semestre1,
        $semestre2
    ) {
        $this->Image('../../img/logo.png', 20, 10, 20);
        $this->SetFont('Times', '', 8);
        $this->Cell(80);
        $this->Cell(30, 10, 'UNIVERSITE DE MAROUA', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(76);
        $this->SetFont('Times', 'I', 8);
        $this->Cell(30, 10, 'THE UNIVERSITY OF MAROUA', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(80);
        $this->Cell(30, 10, '***********************', 0, 0, 'L');
        $this->SetFont('Times', '', 8);
        $this->Ln(3);
        $this->Cell(80);
        $this->Cell(30, 10, 'FACULTE DES SCIENCES', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(80);
        $this->SetFont('Times', 'I', 8);
        $this->Ln(1);
        $this->Cell(80);
        $this->Cell(30, 10, 'FACULTY OF SCIENCE', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(80);
        $this->Cell(30, 10, '**********************', 0, 0, 'L');
        $this->SetFont('Times', '', 8);
        $this->Ln(8);
        $this->Cell(1);
        $this->Cell(30, 10, 'DOMAINE ETABLISSEMENT : ' . $domaineEtablissement . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'NOM ET PRENOM : ' . $nom . ' ' . $prenom . '', 0, 0, 'L');
        $this->Ln(7);
        $this->Cell(1);
        $this->Cell(30, 10, 'MATRICULE : ' . $matricule . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'DATE DE NAISSANCE : ' . $dateNaiss . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'LIEU DE NAISSANCE : ' . $lieuNaiss . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'MENTION : ' . $mention . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'PARCOURS : ' . $parcours . '', 0, 0, 'L');
        $this->Ln(4);
        $this->Cell(1);
        $this->Cell(30, 10, 'CYCLE & NIVEAU : ' . $cycles . ' ' . $niveau . '', 0, 0, 'L');;
        $this->Ln(10);
        $this->Cell(30, 10, 'Edition du ' . date('D., d M. Y H:i') . ' ', 0, 0, 'L');
        $this->Cell(141);
        $this->Cell(30, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C', 0, 0, 'L');
        $this->Ln(8);
    }

    public function bodyPDF(
        $domaineEtablissement,
        $nom,
        $prenom,
        $matricule,
        $dateNaiss,
        $lieuNaiss,
        $mention,
        $niveau,
        $parcours,
        $cycles,
        $bdd,
        $semestre1,
        $semestre2
    ) {

        $pdf = new PDFGenerator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->HeaderPDF(
            $domaineEtablissement,
            $nom,
            $prenom,
            $matricule,
            $dateNaiss,
            $lieuNaiss,
            $mention,
            $niveau,
            $parcours,
            $cycles,
            $semestre1,
            $semestre2
        );
        $pdf->SetFont('Times', '', 8);
        $pdf->SetFillColor(192, 229, 252);
        $pdf->Cell(193,  6, $nom . ' ' . $prenom, 0, 0, 'C', true);
        $pdf->Ln(10);
        $pdf->Cell(8, 6, 'N*', 0, 0, 'C', true);
        $pdf->Cell(15,  6, "CODE UE", 0, 0, 'C', true);
        $pdf->Cell(70,  6, "INTITULE DE L'UE", 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'M/20', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'ANNEE', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'DEC', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'MEN', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'SESSION', 0, 0, 'C', true);
        $pdf->Ln(6);
        //premier semestre
        //UE FONDA
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, 'CYCLE : ' . $cycles . '    NIVEAU : ' . $niveau . '    SEMESTRE : ' . $semestre1 . ' Parcours : ' . $parcours . '', 0, 0, 'L');
        $pdf->Ln(6);
        $pdf->Cell(0, 10, "UNITE D'ENSEIGNEMENTS FONDAMENTALES MOY : CRD : ", 0, 0, 'L');
        $pdf->SetFont('Times', '', 8);
        $pdf->Ln(7);

        $requeteUEFONDA =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre1 . '" 
        AND  categorie = "fondamentale" AND semestreUE = "' . $semestre1 . '"';

        if (!empty($bdd->query($requeteUEFONDA))) {
            foreach ($bdd->query($requeteUEFONDA) as $row) {
                static $i = 1;
                $pdf->Cell(8, 5, $i . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $i++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }

        //UE OPTIO
        $requeteUEOPTIO =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre1 . '" 
        AND  categorie = "optionnele" AND semestreUE = "' . $semestre1 . '"';


        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, "UNITE D'ENSEGNEMENTS DE SPECIALISATION MOY : CRD : ", 0, 0, 'L');
        $pdf->Ln(7);
        $pdf->SetFont('Times', '', 8);
        if (!empty($bdd->query($requeteUEOPTIO))) {
            foreach ($bdd->query($requeteUEOPTIO) as $row) {
                static $e = 1;
                $pdf->Cell(8, 5, $e . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $e++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }
        //UE COMPLE
        $requeteUETRANS =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre1 . '" 
        AND  categorie = "complementaire" AND semestreUE = "' . $semestre1 . '"';

        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, "UNITE D'ENSEGNEMENTS COMPLEMENTAIRE MOY : CRD : ", 0, 0, 'L');
        $pdf->Ln(7);
        $pdf->SetFont('Times', '', 8);

        if (!empty($bdd->query($requeteUETRANS))) {
            foreach ($bdd->query($requeteUETRANS) as $row) {
                static $e = 1;
                $pdf->Cell(8, 5, $e . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $e++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }
        // foreach ($bdd->query($requeteUETRANS) as $row) {
        //     static $r = 1;
        //     $pdf->Cell(8, 5, $r . '.', 1, 0, 'L');
        //     $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
        //     $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
        //     $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
        //     $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
        //     if ($row['MEN'] != ' ') $pdf->Cell(20,  5, "VA", 1, 0, 'C');
        //     $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
        //     $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
        //     $pdf->Ln(5);
        //     $r++;
        // }


        //Semestre suivant
        $pdf->Ln(8);
        $pdf->SetFont('Times', '', 8);
        $pdf->Cell(8, 6, 'N*', 0, 0, 'C', true);
        $pdf->Cell(15,  6, "CODE UE", 0, 0, 'C', true);
        $pdf->Cell(70,  6, "INTITULE DE L'UE", 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'M/20', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'ANNEE', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'DEC', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'MEN', 0, 0, 'C', true);
        $pdf->Cell(20,  6, 'SESSION', 0, 0, 'C', true);
        $pdf->Ln(6);
        //UE FONDA
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, 'CYCLE : ' . $cycles . '    NIVEAU : ' . $niveau . '    SEMESTRE : ' . $semestre2 . ' Parcours : ' . $parcours . '', 0, 0, 'L');
        $pdf->Ln(6);
        $pdf->Cell(0, 10, "UNITE D'ENSEIGNEMENTS FONDAMENTALES MOY : CRD : ", 0, 0, 'L');
        $pdf->SetFont('Times', '', 8);
        $pdf->Ln(7);

        $requeteUEFONDA =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre2 . '" 
        AND  categorie = "fondamentale" AND semestreUE = "' . $semestre2 . '"';
        if (!empty($bdd->query($requeteUEFONDA))) {
            foreach ($bdd->query($requeteUEFONDA) as $row) {
                static $v = 1;
                $pdf->Ln(5);
                $pdf->Cell(8, 5, $v . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $i++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }
        //UE OPTIO
        $requeteUEOPTIO =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre2 . '" 
        AND  categorie = "optionnele" AND semestreUE = "' . $semestre2 . '"';


        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, "UNITE D'ENSEGNEMENTS DE SPECIALISATION MOY : CRD : ", 0, 0, 'L');
        $pdf->Ln(7);
        $pdf->SetFont('Times', '', 8);
        if (!empty($bdd->query($requeteUEOPTIO))) {
            foreach ($bdd->query($requeteUEOPTIO) as $row) {
                static $e = 1;
                $pdf->Cell(8, 5, $e . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $e++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }
        //UE COMPLE
        $requeteUETRANS =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE  `uniteenseignement`.matricule = "' . $matricule . '"
        AND `payement`.`matricule` = "' . $matricule . '" AND `payement`.`semestre` = "' . $semestre2 . '" 
        AND  categorie = "complementaire" AND semestreUE = "' . $semestre2 . '"';

        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(0, 10, "UNITE D'ENSEGNEMENTS COMPLEMENTAIRE MOY : CRD : ", 0, 0, 'L');
        $pdf->Ln(7);
        $pdf->SetFont('Times', '', 8);
        if (!empty($bdd->query($requeteUETRANS))) {
            foreach ($bdd->query($requeteUETRANS) as $row) {
                static $r = 1;
                $pdf->Cell(8, 5, $r . '.', 1, 0, 'L');
                $pdf->Cell(15,  5, $row["codeUniteEnseignement"], 1, 0, 'C');
                $pdf->Cell(70,  5, $row["libelle"], 1, 0, 'L');
                $pdf->Cell(20,  5, $row["M"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["A"], 1, 0, 'C');
                $pdf->Cell(20,  5, "VA", 1, 0, 'C');
                $pdf->Cell(20,  5, $row["MEN"], 1, 0, 'C');
                $pdf->Cell(20,  5, $row["S"], 1, 0, 'C');
                $pdf->Ln(5);
                $r++;
            }
        } else {
            $pdf->Cell(8, 5, '1.', 1, 0, 'L');
            $pdf->Cell(15,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(70,  5, '#VALEUR', 1, 0, 'L');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Cell(20,  5, '#VALEUR', 1, 0, 'C');
            $pdf->Ln(5);
        }

        $pdf->Output("", 'PROFIL ACADEMIQUE ' . $nom . ' ' . $prenom . ' DU ' . date('D. d M. Y H:i') . '.pdf', true);
    }
}
