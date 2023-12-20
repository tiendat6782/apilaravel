import React from "react";
import { Badge } from "@/components/ui/Badge";

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
