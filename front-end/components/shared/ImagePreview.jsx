import React from "react";
import { Button } from "../ui/button";

const ImagePreview = () => {
  return (
    <div className="absolute bottom-0 left-1/2 my-auto mb-3 flex h-fit w-fit -translate-x-1/2  rounded-lg bg-slate-100/30">
      <Button variant="ghost" className="shrink-0">
        ảnh
      </Button>
      <Button variant="ghost" className="shrink-0">
        ảnh
      </Button>
      <Button variant="ghost" className="shrink-0">
        ảnh
      </Button>
      <Button variant="ghost" className="shrink-0">
        ảnh
      </Button>
    </div>
  );
};

export default ImagePreview;
