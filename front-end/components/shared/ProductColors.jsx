import React from "react";
import { Button } from "../ui/button";

const ProductColors = () => {
  return (
    <div className="absolute left-0 top-1/2 my-auto ml-3 flex h-fit w-fit -translate-y-1/2 flex-col rounded-lg bg-slate-100/30">
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

export default ProductColors;
