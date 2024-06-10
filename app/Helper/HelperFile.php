<?php

function fileUpload($fileObject, $folderName = null, $existsFilePath = null)
{
    if ($fileObject)
    {
        if (file_exists($existsFilePath))
        {
            unlink($existsFilePath);
        }
        $fileName       = rand(10, 100000000).uniqid().time().'.'.$fileObject->getClientOriginalExtension();
        $fileDirectory  = 'admin/uploaded-files/'.$folderName.'/';
        $fileObject->move($fileDirectory, $fileName);
        $fileUrl        = $fileDirectory.$fileName;
    } else {
        if (isset($existsFilePath))
        {
            $fileUrl = $existsFilePath;
        } else {
            $fileUrl = null;
        }
    }
    return $fileUrl;
}

function deleteFileFromServer($filePath)
{
    if (file_exists($filePath))
    {
        unlink($filePath);
    }
}
