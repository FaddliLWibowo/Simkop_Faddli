<?php

		$this->fpdf->Open();
		$this->fpdf->AddPage("L",'A4');

        //$this->fpdf->Image('assets/images/logo.png',170,5,33);
        $this->fpdf->SetFont('Arial','B',20);
        $this->fpdf->Cell(0,20,"DAFTAR ANGGOTA",0,1,'C');
        $this->fpdf->Cell(0,0,"KSP KOPDIT PELITA HATI SANTA MARIA",0,1,'C');
        foreach($data_anggota->result() as $db)
        {
        
        $this->fpdf->Cell(0,20, $db->periode ,0,1,'C');
         }
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->SetFillColor(128,128,128);
       // $this->fpdf->Cell(15,10, "No",1,0,"L",1,"C");
        $no = 1;
        $this->fpdf->Cell(15,10, "No",1,0,"L",1);
        $this->fpdf->Cell(30,10, "No BA",1,0,"L",1);
        $this->fpdf->Cell(60,10, "Nama",1,0,"L",1);
        $this->fpdf->Cell(30,10, "Tgl Masuk",1,0,"L",1);
        $this->fpdf->Cell(30,10, "L/P",1,0,"L",1);
        $this->fpdf->Cell(60,10, "Alamat",1,0,"L",1);
        $this->fpdf->Cell(50,10, "Kring/Stasi",1,0,"L",1);
        foreach($data_anggota->result() as $db)
		{
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(15  , 10, $no  ,1,0,"L");
   		    $this->fpdf->Cell(30  , 10, $db->no_ba  ,1,0,"L");
    	    $this->fpdf->Cell(60 , 10, $db->nama_lengkap ,1,0,"L");
            $this->fpdf->Cell(30 , 10, $db->tanggal_masuk ,1,0,"L");
            $this->fpdf->Cell(30 , 10, $db->jenis_kelamin ,1,0,"L");
            $this->fpdf->Cell(60 , 10, $db->alamat ,1,0,"L");
            $this->fpdf->Cell(50 , 10, $db->lingkungan ,1,0,"L");
        $no++;
        }
		$this->fpdf->Output('output.pdf','D');
