<?php

		$this->fpdf->Open();
		$this->fpdf->AddPage("L",'A4');

        //$this->fpdf->Image('assets/images/logo.png',170,5,33);
        $this->fpdf->SetFont('Arial','B',20);
        $this->fpdf->Cell(0,20,"PERHITUNGAN DEVIDEN ANGGOTA",0,1,'C');
        $this->fpdf->Cell(0,0,"KSP KOPDIT PELITA HATI SANTA MARIA",0,1,'C');
       foreach($data_anggota->result() as $db)
        {
        
        $this->fpdf->Cell(0,20, $db->periode ,0,1,'C');
         }
        $this->fpdf->SetFillColor(128,128,128);
       // $this->fpdf->Cell(15,10, "No",1,0,"L",1,"C");
         $this->fpdf->SetFont('Arial','B',12);
        $no = 1;
        $this->fpdf->Cell(15,10, "No",1,0,"L",1);
        $this->fpdf->Cell(30,10, "No BA",1,0,"L",1);
        $this->fpdf->Cell(70,10, "Nama Anggota",1,0,"L",1);
        $this->fpdf->Cell(25,10, "SP",1,0,"L",1);
        $this->fpdf->Cell(25,10, "SW",1,0,"L",1);
        $this->fpdf->Cell(25,10, "SS",1,0,"L",1);
        $this->fpdf->Cell(25,10, "SK",1,0,"L",1);
        $this->fpdf->Cell(60,10, "JUMLAH SP+SW+SS+SK",1,0,"L",1);
       
        foreach($data_anggota->result() as $db)
		{
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(15  , 10, $no  ,1,0,"L");
   		    $this->fpdf->Cell(30  , 10, $db->no_ba  ,1,0,"L");
    	    $this->fpdf->Cell(70 , 10, $db->nama_lengkap ,1,0,"L");
            $this->fpdf->Cell(25 , 10, $db->simpanan_pokok ,1,0,"R");
            $this->fpdf->Cell(25 , 10, $db->simpanan_wajib ,1,0,"R");
            $this->fpdf->Cell(25 , 10, $db->simpanan_sukarela ,1,0,"R");
            $this->fpdf->Cell(25 , 10, $db->uang_pangkal ,1,0,"R");
            $total=$db->simpanan_pokok+$db->simpanan_wajib+$db->simpanan_sukarela+$db->uang_pangkal;
            $this->fpdf->Cell(60 , 10, $total ,1,0,"R");
        $no++;
        }

		$this->fpdf->Output('output.pdf','D');
