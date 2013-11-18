<?php

        $this->fpdf->Open();
        $this->fpdf->AddPage("P",'A4');

        //$this->fpdf->Image('assets/images/logo.png',170,5,33);
        $this->fpdf->SetFont('Arial','B',15);
        $this->fpdf->Cell(0,10,"KSP KOPDIT PELITA HATI St. MARIA a FATIMA",0,1,'C');
        $this->fpdf->SetFont('Arial','',12);
        $this->fpdf->Cell(0,0,"Jl. Ahmad Yani No. 48",0,1,'C');
        $this->fpdf->SetFont('Arial','B',15);
        $this->fpdf->Cell(0,10,"PEKANBARU",0,1,'C');
        $this->fpdf->Line(10,30,200,30);
        $this->fpdf->Line(10,31,200,31);
        $this->fpdf->Line(10,31,200,31);
        $this->fpdf->Line(10,31,200,31);
        $this->fpdf->Line(10,31,200,31);
        $this->fpdf->Line(10,31,200,31);
        $this->fpdf->SetFont('Arial','B',12);
        $this->fpdf->Cell(0,14,"SURAT PERMOHONAN MENJADI ANGGOTA",0,1,'C');
        $this->fpdf->SetFont('Arial','B',12);
        $this->fpdf->Cell(0,0,"KSP KOPDIT PELITA HATI PEKANBARU",0,1,'C');
        $this->fpdf->Line(65,46,145,46);
        $this->fpdf->SetFont('Arial','',12);
        $this->fpdf->Cell(150,20,"No. BA                    : ",0,1,'R');
        $this->fpdf->Cell(150,4,"Nama Lengkap                           : ",0,1,'L');
        $this->fpdf->Cell(150,12,"No. KTP                               : ",0,1,'L');
        $this->fpdf->Cell(150,4,"Jenis Kelamin                          : ",0,1,'L');
        $this->fpdf->Cell(150,12,"Tempat / Tanggal Lahir                : ",0,1,'L');
        $this->fpdf->Cell(150,4,"No. Telp / Hp                          : ",0,1,'L');
        $this->fpdf->Cell(150,12,"Alamat Lengkap                        : ",0,1,'L');
        $this->fpdf->Cell(150,4,"Lingkungan (Kring) / Stasi             : ",0,1,'L');
        $this->fpdf->Cell(150,12,"Pekerjaan                             : ",0,1,'L');
        $this->fpdf->Cell(150,4,"Alamat Pekerjaan                       : ",0,1,'L');
        $this->fpdf->Cell(150,12,"Alamat Pekerjaan                      : ",0,1,'L');
        $this->fpdf->Cell(150,4,"Nama Suami / Isteri                    : ",0,1,'L');
        $this->fpdf->Cell(150,12,"Orang Tua                             : ",0,1,'L');
        $this->fpdf->SetFont('Arial','',12);
        $this->fpdf->Cell(0,14,"Saya mohon dapat diterima menjadi Anggota Koperasi Simpan Pinjam Pelita Hati Pekanbaru. ",0,1,'C'); 
        $this->fpdf->Cell(0,14, " Saya setuju mematuhi Anggaran Dasar dan Anggota Rumah Tangga ",0,1,'C');
        
        $this->fpdf->SetFont('Arial','B',12);
        $this->fpdf->SetFillColor(128,128,128);
       // $this->fpdf->Cell(15,10, "No",1,0,"L",1,"C");
       
        
        $this->fpdf->Output('output.pdf','D');
