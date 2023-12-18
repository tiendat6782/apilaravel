import React from "react";
import { Button } from "../ui/button";

const ImagePreview = () => {
  return (
    <div className="absolute bottom-0 left-1/2 my-auto mb-3 flex h-fit w-fit -translate-x-1/2  rounded-lg bg-slate-100/30">
      <Button variant="ghost" className="shrink-0">
        <div className="h-5 w-5 rounded-full bg-blue-500"></div>
      </Button>
      <Button variant="ghost" className="shrink-0">
        <div className="h-5 w-5 rounded-full bg-gray-500"></div>
      </Button>
      <Button variant="ghost" className="shrink-0">
        <div className="h-5 w-5 rounded-full bg-purple-500"></div>
      </Button>
      <Button variant="ghost" className="shrink-0">
        <div className="h-5 w-5 rounded-full bg-cyan-500"></div>
      </Button>
    </div>
  );
};

export default ImagePreview;
