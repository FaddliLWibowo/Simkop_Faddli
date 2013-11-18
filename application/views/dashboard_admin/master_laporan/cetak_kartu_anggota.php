<?php

        $this->fpdf->Open();
        $this->fpdf->AddPage("L",'A4');

        //$this->fpdf->Image('assets/images/logo.png',170,5,33);
        $this->fpdf->Ln(10);
        $this->fpdf->SetLineWidth(2);
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->Cell(0,7,"KARTU ANGGOTA",1,1,'C');
        $this->fpdf->Cell(0,7,"KSP KOPDIT PELITA HATI",0,1,'C');
        $this->fpdf->Cell(0,7,"SANTA MARIA a FATIMA",0,1,'C');
        $this->fpdf->Cell(0,7,"PEKANBARU",1,1,'C');
        $this->fpdf->Ln(10);
        
        /*$this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->SetFillColor(128,128,128);
       // $this->fpdf->Cell(15,10, "No",1,0,"L",1,"C");
        
        $this->fpdf->Cell(15,10, "No",1,0,"L",1);
        $this->fpdf->Cell(30,10, "No BA",1,0,"L",1);
        $this->fpdf->Cell(60,10, "Nama",1,0,"L",1);
        $this->fpdf->Cell(30,10, "Tgl Masuk",1,0,"L",1);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial','',12);
        $this->fpdf->Cell(30  , 10, $no_ba  ,1,0,"L");
        $this->fpdf->Cell(60 , 10, $nama_lengkap ,1,0,"L");
        $this->fpdf->Cell(30 , 10, $tanggal_masuk ,1,0,"L");*/
        $this->fpdf->Output('output.pdf','D');
