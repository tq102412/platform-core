<?php


namespace Ineplant\Exceptions;


class ExcelOutputException extends ReturnException {
    protected $content;
    protected $fileName;

    /**
     * ReturnException constructor.
     *
     * @param $content
     * @param string $fileName
     */
    public function __construct($content, $fileName) {
        $this->content = $content;
        $this->fileName = $fileName;
    }


    /**
     * 输出excel
     *
     * @return array
     */
    public function render() {
        return response($this->content)->withHeaders([
            'Content-type' =>  "application/vnd.ms-excel",
            'Content-Disposition' => "filename={$this->fileName}.xls"
        ]);
    }
}