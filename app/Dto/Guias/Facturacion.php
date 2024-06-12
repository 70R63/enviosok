<?php
namespace App\Dto\Guias;

use Log;
use Carbon\Carbon;



class Facturacion 
{
    private $data = array();

    const REMITENTE = 'remitente';
    const DESTINATARIO = 'destinatario';

    
    function __construct()
    {
        // code...
    }

    /**
     * Genera parce para el vbody de factuacion
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Dto\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion parsear
     * 
     * @throws \LogicException
     *
     * @param array $data 
     * 
     * @var array $dataParseado Array que contendra la estructura del body  
     * 
     * 
     * @return void
     */

    public function parsear($data){
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        #Log::debug(print_r($data,true));
        $dataParseado = array();

        $emailMensaje = sprintf("Gracias por su prerencia ");
        
        $fecha = sprintf("%sT%s",carbon::now()->format('Y-m-d'),carbon::now()->format('H:i:s'));
        Log::info($fecha);

        $dataParseado =["DatosGenerales" => [
         "Version" => "4.0", 
         "CSD" => "MIIFsDCCA5igAwIBAgIUMzAwMDEwMDAwMDA1MDAwMDM0MTYwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWxpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMjMwNTE4MTE0MzUxWhcNMjcwNTE4MTE0MzUxWjCB1zEnMCUGA1UEAxMeRVNDVUVMQSBLRU1QRVIgVVJHQVRFIFNBIERFIENWMScwJQYDVQQpEx5FU0NVRUxBIEtFTVBFUiBVUkdBVEUgU0EgREUgQ1YxJzAlBgNVBAoTHkVTQ1VFTEEgS0VNUEVSIFVSR0FURSBTQSBERSBDVjElMCMGA1UELRMcRUtVOTAwMzE3M0M5IC8gVkFEQTgwMDkyN0RKMzEeMBwGA1UEBRMVIC8gVkFEQTgwMDkyN0hTUlNSTDA1MRMwEQYDVQQLEwpTdWN1cnNhbCAxMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtmecO6n2GS0zL025gbHGQVxznPDICoXzR2uUngz4DqxVUC/w9cE6FxSiXm2ap8Gcjg7wmcZfm85EBaxCx/0J2u5CqnhzIoGCdhBPuhWQnIh5TLgj/X6uNquwZkKChbNe9aeFirU/JbyN7Egia9oKH9KZUsodiM/pWAH00PCtoKJ9OBcSHMq8Rqa3KKoBcfkg1ZrgueffwRLws9yOcRWLb02sDOPzGIm/jEFicVYt2Hw1qdRE5xmTZ7AGG0UHs+unkGjpCVeJ+BEBn0JPLWVvDKHZAQMj6s5Bku35+d/MyATkpOPsGT/VTnsouxekDfikJD1f7A1ZpJbqDpkJnss3vQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAFaUgj5PqgvJigNMgtrdXZnbPfVBbukAbW4OGnUhNrA7SRAAfv2BSGk16PI0nBOr7qF2mItmBnjgEwk+DTv8Zr7w5qp7vleC6dIsZFNJoa6ZndrE/f7KO1CYruLXr5gwEkIyGfJ9NwyIagvHHMszzyHiSZIA850fWtbqtythpAliJ2jF35M5pNS+YTkRB+T6L/c6m00ymN3q9lT1rB03YywxrLreRSFZOSrbwWfg34EJbHfbFXpCSVYdJRfiVdvHnewN0r5fUlPtR9stQHyuqewzdkyb5jTTw02D2cUfL57vlPStBj7SEi3uOWvLrsiDnnCIxRMYJ2UA2ktDKHk+zWnsDmaeleSzonv2CHW42yXYPCvWi88oE1DJNYLNkIjua7MxAnkNZbScNw01A6zbLsZ3y8G6eEYnxSTRfwjd8EP4kdiHNJftm7Z4iRU7HOVh79/lRWB+gd171s3d/mI9kte3MRy6V8MMEMCAnMboGpaooYwgAmwclI2XZCczNWXfhaWe0ZS5PmytD/GDpXzkX0oEgY9K/uYo5V77NdZbGAjmyi8cE2B2ogvyaN2XfIInrZPgEffJ4AB7kFA2mwesdLOCh0BLD9itmCve3A1FGR4+stO2ANUoiI3w3Tv2yQSg4bjeDlJ08lXaaFCLW2peEXMXjQUk7fmpb5MNuOUTW6BE=", 
         "LlavePrivada" => "MIIFDjBABgkqhkiG9w0BBQ0wMzAbBgkqhkiG9w0BBQwwDgQIAgEAAoIBAQACAggAMBQGCCqGSIb3DQMHBAgwggS/AgEAMASCBMh4EHl7aNSCaMDA1VlRoXCZ5UUmqErAbucoZQObOaLUEm+I+QZ7Y8Giupo+F1XWkLvAsdk/uZlJcTfKLJyJbJwsQYbSpLOCLataZ4O5MVnnmMbfG//NKJn9kSMvJQZhSwAwoGLYDm1ESGezrvZabgFJnoQv8Si1nAhVGTk9FkFBesxRzq07dmZYwFCnFSX4xt2fDHs1PMpQbeq83aL/PzLCce3kxbYSB5kQlzGtUYayiYXcu0cVRu228VwBLCD+2wTDDoCmRXtPesgrLKUR4WWWb5N2AqAU1mNDC+UEYsENAerOFXWnmwrcTAu5qyZ7GsBMTpipW4Dbou2yqQ0lpA/aB06n1kz1aL6mNqGPaJ+OqoFuc8Ugdhadd+MmjHfFzoI20SZ3b2geCsUMNCsAd6oXMsZdWm8lzjqCGWHFeol0ik/xHMQvuQkkeCsQ28PBxdnUgf7ZGer+TN+2ZLd2kvTBOk6pIVgy5yC6cZ+o1Tloql9hYGa6rT3xcMbXlW+9e5jM2MWXZliVW3ZhaPjptJFDbIfWxJPjz4QvKyJk0zok4muv13Iiwj2bCyefUTRz6psqI4cGaYm9JpscKO2RCJN8UluYGbbWmYQU+Int6LtZj/lv8p6xnVjWxYI+rBPdtkpfFYRp+MJiXjgPw5B6UGuoruv7+vHjOLHOotRo+RdjZt7NqL9dAJnl1Qb2jfW6+d7NYQSI/bAwxO0sk4taQIT6Gsu/8kfZOPC2xk9rphGqCSS/4q3Os0MMjA1bcJLyoWLp13pqhK6bmiiHw0BBXH4fbEp4xjSbpPx4tHXzbdn8oDsHKZkWh3pPC2J/nVl0k/yF1KDVowVtMDXE47k6TGVcBoqe8PDXCG9+vjRpzIidqNo5qebaUZu6riWMWzldz8x3Z/jLWXuDiM7/Yscn0Z2GIlfoeyz+GwP2eTdOw9EUedHjEQuJY32bq8LICimJ4Ht+zMJKUyhwVQyAER8byzQBwTYmYP5U0wdsyIFitphw+/IH8+v08Ia1iBLPQAeAvRfTTIFLCs8foyUrj5Zv2B/wTYIZy6ioUM+qADeXyo45uBLLqkN90Rf6kiTqDld78NxwsfyR5MxtJLVDFkmf2IMMJHTqSfhbi+7QJaC11OOUJTD0v9wo0X/oO5GvZhe0ZaGHnm9zqTopALuFEAxcaQlc4R81wjC4wrIrqWnbcl2dxiBtD73KW+wcC9ymsLf4I8BEmiN25lx/OUc1IHNyXZJYSFkEfaxCEZWKcnbiyf5sqFSSlEqZLc4lUPJFAoP6s1FHVcyO0odWqdadhRZLZC9RCzQgPlMRtji/OXy5phh7diOBZv5UYp5nb+MZ2NAB/eFXm2JLguxjvEstuvTDmZDUb6Uqv++RdhO5gvKf/AcwU38ifaHQ9uvRuDocYwVxZS2nr9rOwZ8nAh+P2o4e0tEXjxFKQGhxXYkn75H3hhfnFYjik/2qunHBBZfcdG148MaNP6DjX33M238T9Zw/GyGx00JMogr2pdP4JAErv9a5yt4YR41KGf8guSOUbOXVARw6+ybh7+meb7w4BeTlj3aZkv8tVGdfIt3lrwVnlbzhLjeQY6PplKp3/a5Kr5yM0T4wJoKQQ6v3vSNmrhpbuAtKxpMILe8CQoo=", 
         "CSDPassword" => "12345678a", 
         "GeneraPDF" => true, 
         "Logotipo" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIGlkPSJMYXllcl8yIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyODkuMDcgMjg5LjA3Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6bm9uZTt9LmNscy0xLC5jbHMtMiwuY2xzLTMsLmNscy00e3N0cm9rZS13aWR0aDowcHg7fS5jbHMtMntmaWxsOiNmN2JjMTY7fS5jbHMtNXtpc29sYXRpb246aXNvbGF0ZTt9LmNscy0ze2ZpbGw6I2ZmZjt9LmNscy00e2ZpbGw6IzFjNzViYzt9PC9zdHlsZT48L2RlZnM+PGcgaWQ9IkxheWVyXzEtMiI+PGcgY2xhc3M9ImNscy01Ij48cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik04My42NywxMjQuODdjLTEuMDgsMC0yLjE3LS4yMi0zLjIxLS42OC0yMy4xMi0xMC4yMi0zOC4wNi0zMy4xNS0zOC4wNi01OC40MnYtOC44M2MwLTQuNCwzLjU2LTcuOTYsNy45NS03Ljk2czcuOTYsMy41Niw3Ljk2LDcuOTZ2OC44M2MwLDE4Ljk4LDExLjIyLDM2LjIsMjguNTgsNDMuODcsNC4wMiwxLjc3LDUuODQsNi40Nyw0LjA2LDEwLjQ5LTEuMzEsMi45Ny00LjIzLDQuNzQtNy4yOCw0Ljc0Ii8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNNjAuOTQsNTYuOTNjMC01Ljg1LTQuNzQtMTAuNTgtMTAuNTgtMTAuNThzLTEwLjU4LDQuNzQtMTAuNTgsMTAuNTgsNC43NCwxMC41OCwxMC41OCwxMC41OCwxMC41OC00Ljc0LDEwLjU4LTEwLjU4Ii8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNNTQuNSw1Mi40MmgwYy0xLjkxLDAtMy40Ni0xLjU1LTMuNDYtMy40NnYtMTAuMzljMC0xLjkxLDEuNTUtMy40NywzLjQ2LTMuNDdzMy40NiwxLjU1LDMuNDYsMy40N3YxMC4zOWMwLDEuOTEtMS41NSwzLjQ2LTMuNDYsMy40NiIvPjxwYXRoIGNsYXNzPSJjbHMtMiIgZD0iTTUyLjM0LDQ5Ljk4aDBjLTEuMzUsMS4zNS0zLjU0LDEuMzUtNC45LDBsLTcuMzUtNy4zNWMtMS4zNS0xLjM1LTEuMzUtMy41NSwwLTQuOSwxLjM1LTEuMzUsMy41NC0xLjM1LDQuOSwwbDcuMzUsNy4zNWMxLjM1LDEuMzUsMS4zNSwzLjU0LDAsNC45Ii8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjM5LjQsMTgyLjQxYy00LjMxLDAtNy44Ni0zLjQ1LTcuOTUtNy43OWwtLjE5LTguODNjLS40LTE4Ljk4LTExLjk5LTM1Ljk1LTI5LjUxLTQzLjI1LTQuMDUtMS42OS01Ljk4LTYuMzUtNC4yOS0xMC40LDEuNjktNC4wNiw2LjM1LTUuOTcsMTAuNC00LjI4LDIzLjMzLDkuNzIsMzguNzYsMzIuMzIsMzkuMyw1Ny42bC4xOSw4LjgzYy4wOSw0LjM5LTMuMzksOC4wMy03Ljc4LDguMTItLjA2LDAtLjEyLDAtLjE4LDAiLz48cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik0yMjguODMsMTc0LjY4Yy4xMyw1Ljg0LDQuOTYsMTAuNDgsMTAuODEsMTAuMzUsNS44NC0uMTIsMTAuNDgtNC45NiwxMC4zNi0xMC44MS0uMTMtNS44NC00Ljk2LTEwLjQ4LTEwLjgxLTEwLjM1LTUuODQuMTItMTAuNDgsNC45Ni0xMC4zNSwxMC44MSIvPjxwYXRoIGNsYXNzPSJjbHMtMiIgZD0iTTIzNy43MiwxNjcuODJoMGMxLjQ3LDEuMjMsMS42NiwzLjQxLjQzLDQuODhsLTYuNjgsNy45NmMtMS4yMywxLjQ3LTMuNDEsMS42Ni00Ljg4LjQzLTEuNDctMS4yMy0xLjY2LTMuNDEtLjQzLTQuODhsNi42OC03Ljk2YzEuMjMtMS40NywzLjQxLTEuNjYsNC44OC0uNDMiLz48cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik05MC42OSwyNTMuOTZjLTQuMzMsMC04LjAzLTMuMzEtOC40Mi03LjcxLS40Mi00LjY2LDMuMDItOC43Nyw3LjY4LTkuMTlsNy4xNC0uNjRjLTIuMjUtMTYuMjEtLjU5LTMyLjcxLDQuOS00OC4yNWwuODItMi4zMWMxLjU2LTQuNDEsNi40LTYuNzIsMTAuOC01LjE2LDQuNDEsMS41Niw2LjcyLDYuNCw1LjE2LDEwLjgxbC0uODIsMi4zMWMtNS40OSwxNS41NC02LjM5LDMyLjIzLTIuNiw0OC4yNy41NiwyLjM5LjA3LDQuOTEtMS4zNyw2LjktMS40NCwxLjk5LTMuNjcsMy4yNi02LjExLDMuNDhsLTE2LjQxLDEuNDdjLS4yNS4wMi0uNTEuMDMtLjc2LjAzIi8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjA0LjA1LDI1My45NmMtLjI1LDAtLjUxLDAtLjc2LS4wM2wtMTYuNDEtMS40N2MtMi40NS0uMjItNC42OC0xLjQ5LTYuMTItMy40OC0xLjQzLTEuOTktMS45My00LjUxLTEuMzctNi45LDMuNzktMTYuMDQsMi44OS0zMi43My0yLjYtNDguMjdsLS44MS0yLjMxYy0xLjU2LTQuNDEuNzUtOS4yNSw1LjE2LTEwLjgxLDQuNC0xLjU2LDkuMjUuNzUsMTAuOCw1LjE2bC44MiwyLjMxYzUuNSwxNS41NSw3LjE1LDMyLjA1LDQuOTEsNDguMjZsNy4xMy42NGM0LjY2LjQyLDguMSw0LjUzLDcuNjgsOS4xOS0uNCw0LjQtNC4wOSw3LjcxLTguNDIsNy43MSIvPjxwYXRoIGNsYXNzPSJjbHMtMiIgZD0iTTE0Ny4zNywzNy43MmM0MS44NiwwLDc1Ljc5LDMzLjkzLDc1Ljc5LDc1Ljc5cy0zMy45Myw3NS43OS03NS43OSw3NS43OS03NS43OS0zMy45My03NS43OS03NS43OSwzMy45My03NS43OSw3NS43OS03NS43OSIvPjxwYXRoIGNsYXNzPSJjbHMtMiIgZD0iTTcxLjU4LDExNS4zMWgxNTEuNThjMCwxMC4xNy0xLjQ1LDIwLjI0LTQuMjgsMjkuOTEtNC4xOCwxNC4zMS0xMi4zOSwyNy4xMi0yMy4yNSwzNy4zM2wtNDEuNTMsMzkuMDJjLTMuNzgsMy41NS05LjY3LDMuNTUtMTMuNDUsMGwtNDEuNTMtMzkuMDJjLTEwLjg3LTEwLjIxLTE5LjA4LTIzLjAyLTIzLjI1LTM3LjMzLTIuODItOS42Ny00LjI4LTE5Ljc0LTQuMjgtMjkuOTEiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0xNDcuMzcsNjYuNDRjMjUuOTksMCw0Ny4wNiwyMS4wNyw0Ny4wNiw0Ny4wNnMtMjEuMDcsNDcuMDYtNDcuMDYsNDcuMDYtNDcuMDYtMjEuMDctNDcuMDYtNDcuMDYsMjEuMDctNDcuMDYsNDcuMDYtNDcuMDYiLz48cGF0aCBjbGFzcz0iY2xzLTQiIGQ9Ik0xNDcuODIsMTUwLjk4Yy0xOS4zMSwwLTM1LjAyLTE1LjcxLTM1LjAyLTM1LjAyLDAtMi41MSwyLjA0LTQuNTUsNC41NS00LjU1czQuNTUsMi4wMyw0LjU1LDQuNTVjMCwxNC4zLDExLjYzLDI1LjkyLDI1LjkyLDI1LjkyczI1LjkyLTExLjYzLDI1LjkyLTI1LjkyYzAtMi41MSwyLjA0LTQuNTUsNC41NS00LjU1czQuNTUsMi4wMyw0LjU1LDQuNTVjMCwxOS4zMS0xNS43MSwzNS4wMi0zNS4wMiwzNS4wMiIvPjxwYXRoIGNsYXNzPSJjbHMtNCIgZD0iTTE2OS42OCw5Mi40YzAtMy44My0zLjEtNi45My02LjkzLTYuOTNzLTYuOTMsMy4xLTYuOTMsNi45MywzLjEsNi45Myw2LjkzLDYuOTMsNi45My0zLjEsNi45My02LjkzIi8+PHBhdGggY2xhc3M9ImNscy00IiBkPSJNMTM3LjcxLDkyLjRjMC0zLjgzLTMuMS02LjkzLTYuOTMtNi45M3MtNi45MywzLjEtNi45Myw2LjkzLDMuMSw2LjkzLDYuOTMsNi45Myw2LjkzLTMuMSw2LjkzLTYuOTMiLz48L2c+PHJlY3QgY2xhc3M9ImNscy0xIiB3aWR0aD0iMjg5LjA3IiBoZWlnaHQ9IjI4OS4wNyIvPjwvZz48L3N2Zz4=", 
         "CFDI" => "Factura", 
         "OpcionDecimales" => "1", 
         "NumeroDecimales" => "2", 
         "TipoCFDI" => "Ingreso", 
         "EnviaEmail" => true, 
         "ReceptorEmail" => "javierv31@gmail.com", 
         "ReceptorCC" => "", 
         "ReceptorCCO" => "", 
         "EmailMensaje" => $emailMensaje
        ], 
        "Encabezado" => [
            "CFDIsRelacionados" => "", 
            "TipoRelacion" => "04", 
            "Emisor" => [
               "RFC" => "EKU9003173C9", 
               "NombreRazonSocial" => "ESCUELA KEMPER URGATE", 
               "RegimenFiscal" => "601", 
               "Direccion" => array($this->direccion($data, self::REMITENTE))
            ], 
            "Receptor" => [
                "RFC" => "SSF1103037F1", 
                "NombreRazonSocial" => "SCAFANDRA SOFTWARE FACTORY,", 
                "UsoCFDI" => "G03", 
                "DomicilioFiscalReceptor" => "06470", 
                "RegimenFiscal" => "601", 
                "Direccion" => $this->direccion($data, self::DESTINATARIO)
             ], 
            "Fecha" => $fecha, 
            "Serie" => "AB", 
            "Folio" => "102", 
            "MetodoPago" => "PUE", 
            "FormaPago" => "01", 
            "Moneda" => "MXN", 
            "LugarExpedicion" => $data['cp'], 
            "SubTotal" => $data['costo_base'], 
            "Total" => $data['precio'],
        ], 
        "Conceptos" => [
            [
                "Cantidad" => "1", 
                "CodigoUnidad" => "E48", 
                "Unidad" => "Servicio", 
                "CodigoProducto" => "84111506", 
                "Producto" => "Guias de paqueteria", 
                "PrecioUnitario" => $data['costo_base'], 
                "Importe" => $data['costo_base'], 
                "ObjetoDeImpuesto" => "02", 
                "Impuestos" => [
                    [
                        "TipoImpuesto" => "1", 
                        "Impuesto" => "2", 
                        "Factor" => "1", 
                        "Base" => $data['costo_base'], 
                        "Tasa" => "0.160000", 
                        "ImpuestoImporte" => $data['precio']-$data['costo_base'] 
                    ] 
                ] 
            ] 
        ] 
        ]; //fin dataParseado 

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->data=$dataParseado;
    }


    /**
     * Persea la direccions Destino y Remitente
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Dto\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion direccion
     * 
     * @throws \LogicException
     *
     * @param array $data Array con los datos de creacion de la guia
     * @param string $tipo Indicador para saber que 'key' usar del arreglao data
     * 
     * @var array $dataParseado Array que contendra la estructura del body  
     * 
     * 
     * @return array
     */

    private function direccion($data, $tipo){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $direccion = array();
        
        $comodinKey = "";
        if ($tipo === self::DESTINATARIO) {
            $comodinKey = "_d";
        } 

        $calle = $data['calle'.$comodinKey];
        $noExt = $data['no_exterior'.$comodinKey];
        $noInt = $data['no_interior'.$comodinKey];
        $colonia = $data['colonia'.$comodinKey]; 
        $localidad = $data['municipio_alcaldia'.$comodinKey]; 
        $municipio = $data['municipio_alcaldia'.$comodinKey]; 
        $estado = $data['estado'.$comodinKey]; 
        $cp = $data['cp'.$comodinKey];

        $direccion = [
            "Calle" => $calle, 
            "NumeroExterior" => $noExt, 
            "NumeroInterior" => $noInt, 
            "Colonia" => $colonia, 
            "Localidad" => $municipio, 
            "Municipio" => $municipio, 
            "Estado" => $estado, 
            "Pais" => "Mexico", 
            "CodigoPostal" => $cp 
        ];
        


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return $direccion;
    }

    public function getData(){
        return $this->data;
    }


}