import React from "react";
import { Button } from "@/components/ui/button";

const GlobalFilters = () => {
  return (
    <div className="flex_start custom-scrollbar  mx-auto overflow-x-scroll p-3">
      <Button className="text-xs " variant="outline">
        Giày cầu lông
      </Button>
      <Button className="text-xs " variant="outline">
        Giày chạy bộ
      </Button>
      <Button className="text-xs " variant="outline">
        Giày chạy bộ
      </Button>
      <Button className="text-xs " variant="outline">
        Giày chạy bộ
      </Button>
    </div>
  );
};

export default GlobalFilters;
