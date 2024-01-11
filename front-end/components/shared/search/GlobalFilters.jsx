import { Badge } from "@/components/ui/badge";
import React from "react";

const GlobalFilters = () => {
  return (
    <div className="flex_start custom-scrollbar  mx-auto overflow-x-scroll py-3">
      <Badge className="text-xs " variant="outline">
        Giày cầu lông
      </Badge>
      <Badge className="text-xs " variant="outline">
        Giày chạy bộ
      </Badge>
      <Badge className="text-xs " variant="outline">
        Giày chạy bộ
      </Badge>
      <Badge className="text-xs " variant="outline">
        Giày chạy bộ
      </Badge>
    </div>
  );
};

export default GlobalFilters;
